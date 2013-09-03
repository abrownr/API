require 'test_helper.rb'

describe Vognition do
  before do
    @appkey     = '59c000476cf2a00b9f5555585c177276d8a4d75f'
    @appsecret  = '01d3cb9455722c2f6760e11f14a05711796aaaaa'
    @conkey     = '09326eeeee2cad2ae9f4c0fd5d4c7b71db2b0e48'
    @consecret  = '7092379b31cd621c2c1b574e47ec956733faaaaa'
    @locale     = 'en-US'
    @speaker    = 'usenglishfemale'
    @wav        = '../common/ALARM_1.wav'
    @host       = 'sample.whataremindsfor.com'
    @port       = 26900
    @client     = Vognition.new do |config|
                    config.application_key    = @appkey
                    config.application_secret = @appsecret
                    config.consumer_key       = @conkey
                    config.consumer_secret    = @consecret
                    config.host               = @host
                    config.port               = @port
                  end
  end

  describe ".new" do
    it "should accept a configuration" do
      @client.application_key.must_equal @appkey
      @client.application_secret.must_equal @appsecret
      @client.consumer_key.must_equal @conkey
      @client.consumer_secret.must_equal @consecret
      @client.host.must_equal @host
      @client.port.must_equal @port
    end
  end

  describe "#recognize" do
    it "should make a request to the vognition API /recognize endpoint" do
      VCR.use_cassette("vognition_alarm") do
        res = @client.recognize(@wav)
        res.response.must_equal "1112035"
        res.tts_response.must_match /triggered.+alarm/
        res.tts_response_path.must_match %r{http://.+/tts/.+\.wav}
      end
    end
  end
end
