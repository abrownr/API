#!/usr/bin/env python
# Paul Turner
# send.py file to push wav to API to return JSON

import requests

appkey = '59c000476cf2a00b9f5555585c177276d8a4d75f'
appsecret = '01d3cb9455722c2f6760e11f14a05711796aaaaa'
conkey = '09326eeeee2cad2ae9f4c0fd5d4c7b71db2b0e48'
consecret = '7092379b31cd621c2c1b574e47ec956733faaaaa'
locale = 'en-US'
ttsSpeakerType = 'usenglishfemale'
wav = '../common/ALARM_1.wav'

url = 'http://sample.whataremindsfor.com:26900/apiv1/recognize/'
files = {'wav': ('wav', open(wav, 'rb'))}
data = {
	'appkey' : appkey,
	'appsecret' : appsecret,
	'conkey' : conkey,
	'consecret' : consecret,
	'locale' : locale,
	'ttsSpeakerType' : ttsSpeakerType
}
res = requests.post(url, files=files, data=data)

print res.text
