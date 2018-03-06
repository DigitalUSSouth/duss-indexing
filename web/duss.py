from flask import Flask, Response,request,render_template
from pprint import pprint
import json
from urllib.parse import quote_plus
import requests

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

if __name__ == "__main__":
    app.run(host='0.0.0.0',debug=True,port=5001)