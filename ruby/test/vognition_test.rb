require 'test_helper.rb'

describe Vognition do
  it "should load the libraries required to complete an API call" do
    appkey    = '59c000476cf2a00b9f5555585c177276d8a4d75f'
    appsecret = '01d3cb9455722c2f6760e11f14a05711796aaaaa'
    conkey    = '09326eeeee2cad2ae9f4c0fd5d4c7b71db2b0e48'
    consecret = '7092379b31cd621c2c1b574e47ec956733faaaaa'
    locale    = 'en-US'
    speaker   = 'usenglishfemale'
    wav       = '../common/ALARM_1.wav'
    url       = 'http://sample.whataremindsfor.com:26900'
    path      = '/apiv1/recognize/'

    request = {
      appkey:         appkey,
      appsecret:      appsecret,
      conkey:         conkey,
      consecret:      consecret,
      locale:         locale,
      ttsSpeakerType: speaker,
      wav:            Faraday::UploadIO.new(wav, "audio/wav")
    }

    conn = Faraday.new(:url => url) do |faraday|
      faraday.request  :multipart               # form-encode POST params
      faraday.response :logger                  # log requests to STDOUT
      faraday.adapter  Faraday.default_adapter  # make requests with Net::HTTP
    end

    response = conn.post path, request

    response.status.must_equal 200
  end
end
