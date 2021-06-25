import requests
from django.shortcuts import render
from urllib.request import urlopen
import json


def home(request):
    data = []
    url = "https://covid-193.p.rapidapi.com/statistics"

    querystring = {"country":"India"}

    headers = {
        "x-rapidapi-host": "covid-193.p.rapidapi.com",
        "x-rapidapi-key": "da1da95e9fmsh805e28c9f15883fp1d684djsn7594de5c5318",
    }

    response = requests.request("GET", url, headers=headers, params=querystring).json()

    data = response['response']
    
    d = response['response']
    s = d[0]

    context = {
        'all': s['cases']['total'],
        'recovered': s['cases']['recovered'],
        'deaths': s['deaths']['total'],
        'new': s['cases']['new'],
        'critical': s['cases']['critical'],
    }
    
   

    return render(request, 'index.html', context)
