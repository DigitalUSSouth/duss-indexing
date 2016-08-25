import ijson
import json
#import requests
import urllib
from urllib.request import urlopen

jsonfile = urlopen("http://localhost/duss/json/docs.json")

#print (jsonfile)

documents = ijson.items(jsonfile,'item')

#print (type(objects))

for document in documents:
    data = {'add':[document]}
    jsonData = json.dumps(data)
    #print (jsonData)

    req = urllib.request.Request('http://localhost:8983/solr/duss-indexing/update')
    req.add_header('Content-Type', 'application/json')
    response = urllib.request.urlopen(req, jsonData.encode("utf-8"))

    print (vars(response))
    #byteString = response.content.decode('utf-8')
    print (response.read().decode())
    #print (document['url'])
    #jsonDoc = json.dump(document)

    print ('\n')