#!/usr/bin/env python
# Paul Turner
# send.py file to push wav to API to return JSON

import requests

headers = {'content-type': 'multipart/mixed',
            'boundary': 'gc0p4Jq0M2Yt08jU534c0p'}

request_url = r'http://sample.whataremindsfor.com:26900/apiv1/recognize/'
appkey = '59c000476cf2a00b9f5555585c177276d8a4d75f'
appsecret = '01d3cb9455722c2f6760e11f14a05711796aaaaa'
conkey = '09326eeeee2cad2ae9f4c0fd5d4c7b71db2b0e48'
consecret = '7092379b31cd621c2c1b574e47ec956733faaaaa'
# locale = ''
locale = 'en-US'
ttsSpeakerType = 'usenglishfemale'
wav = '/Users/pturner/Documents/Var/Vognition/Vognition/ExampleHtmlSiteCode/ALARM_1.wav'
# wav = ''

payload = { '59c000476cf2a00b9f5555585c177276d8a4d75f' : appkey,
            'appsecret' : appsecret,
            'conkey' : conkey,
            'consecret' : consecret,
            'locale' : locale,
            'ttsSpeakerType' : ttsSpeakerType,
            'wav' : wav }

print payload

r = requests.post(request_url, data=payload, headers=headers)

print r.text
