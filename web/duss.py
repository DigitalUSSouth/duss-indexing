from flask import Flask, Response,request,render_template
from pprint import pprint
import json
from urllib.parse import quote_plus
import requests
import copy

#import solr schema
exec(open("./schema.py").read())

app = Flask(__name__)

@app.route('/')
@app.route('/index')
def index():
    response = Response()
    #response.set_data("hi")
    with open('projects.json') as data_file:    
        projects = json.load(data_file)
    with open('carousel.json') as data_file:    
        carousel = json.load(data_file)
    return render_template('index.html',title='Home',carousel=carousel, projects=projects)

@app.route('/featured-projects')
def feat_projects():
    response = Response()
    #response.set_data("hi")
    with open('projects.json') as data_file:    
        projects = json.load(data_file)
    return render_template('featured-projects.html',title='Featured projects', projects=projects)

@app.route('/search')
def search():
    response = Response()
    #response.headers['Content-Type'] = 'application/json'
    unsafe_query = {
        "q": request.args.get('q'),
        "f": request.args.get('f'),
        "start": request.args.get('start'),
        "rows": request.args.get('rows'),
    }
    fq = request.args.get('fq')
    if not fq==None:
        fqs = fq.split(';')
        filter_queries  = {}
        for fq in fqs:
            filter_query = fq.split(':')
            if len(filter_query)==2:
                filter_queries[filter_query[0]] = filter_query[1]
        unsafe_query['fq'] = filter_queries
    #pprint(filter_queries)
    #pprint(request.args.to_dict())
    r = requests.post('http://localhost:5000/search',json=unsafe_query)
    print(r.status_code)
    search_results = json.loads(r.text)
    pprint(search_results)
    facets = {}
    filter_queries = unsafe_query['fq'] if 'fq' in unsafe_query else {}
    for f,data in search_results['facets']['facet_fields'].items():
        facet_counter = 0
        #print(type(data))
        if len(data)==0:
            continue
        #print(data)
        while facet_counter < len(data):
            title = data[facet_counter]
            num = data[facet_counter+1]
            if not num==0:
                facet = {
                    "expanded": True if f in filter_queries else False,
                    "title":title,
                    "count":num,
                    "url": build_facet_filter_query(unsafe_query,title,f)
                    #"name":f
                }
                if f in filter_queries and filter_queries[f] == title:
                    facet['bold'] = True
                else:
                    facet['bold'] = False
                if f in facets:
                    facets[f].append(facet)
                else:
                    facets[f] = [facet]
            facet_counter += 2
    #pprint(facets)
    ordered_facets = []
    for name,title in facet_fields.items():
        if name in facets:
            ordered_facets.append([facet_fields[name],facets[name]])
    pprint(ordered_facets)
    #response.set_data(r.content)

    results = search_results['response']['docs']
    new_results = []
    for doc in results:
        new_doc = {}
        for key,item in doc.items():
            if isinstance(item,str):
                new_doc[key] = [item]
            else:
                new_doc[key] = [item]
        new_results.append(new_doc)
    pprint(brief_display_fields)
    with open('carousel.json') as data_file:    
        carousel = json.load(data_file)
    return render_template("search.html",facets = ordered_facets,carousel=carousel,search_results=new_results,brief_display_fields=brief_display_fields,solr_field_names=solr_field_names)

def build_facet_filter_query(current_query,query,field):
    current_query = copy.deepcopy(current_query)
    if 'fq' in current_query:
        current_query['fq'][field] = query
    else:
        current_query['fq'] = {field:query}
    url = "search?q="+quote_plus(current_query['q'])
    url = url + "&f=" + quote_plus(current_query['f'])
    url = url + "&start=" + quote_plus(current_query['start'])
    url = url + "&rows=" + quote_plus(current_query['rows'])
    fqs = "&fq="
    for q,f in current_query['fq'].items():
        fqs  = fqs + q + ":\"" + f.replace("\"","") + "\";"
    url = url + fqs
    return url

def json_encode(data):
    return json.dumps(data,ensure_ascii=False,indent=4, sort_keys=True)

if __name__ == "__main__":
    app.run(host='0.0.0.0',debug=True,port=5001)