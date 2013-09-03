require 'faraday'
require 'json'

class Vognition

  DEFAULTS = {
    scheme:   "http",
    locale:   "en-US",
    speaker:  "usenglishfemale",
  }

  def initialize
    @options = DEFAULTS.dup
    yield self if block_given?
  end

  %w{ application_key
      application_secret
      consumer_key
      consumer_secret
      scheme
      host
      port
      locale
      speaker }.each do |field|

    # getters
    define_method(field) do
      instance_variable_get(:@options)[field.to_sym]
    end

    # setters
    define_method("#{field}=") do |value|
      options = instance_variable_get(:@options)
      options[field.to_sym] = value
    end
  end

  def base_url
    raise ArgumentError if host.nil? or port.nil?
    URI.parse("#{scheme}://#{host}:#{port}/apiv1/")
  end

  # perform API request to recognize endpoint
  def recognize(audio_path)
    conn = Faraday.new(:url => base_url) do |faraday|
      faraday.request  :multipart               # form-encode POST params
      faraday.adapter  Faraday.default_adapter  # make requests with Net::HTTP
    end
    params = {
      appkey:         application_key,
      appsecret:      application_secret,
      conkey:         consumer_key,
      consecret:      consumer_secret,
      locale:         locale,
      ttsSpeakerType: speaker,
      wav:            Faraday::UploadIO.new(audio_path, "audio/wav")
    }
    response = conn.post 'recognize/', params
    json = JSON.parse response.body

    Response.new(
      response.body,
      * %w{ response ttsResponse ttsResponsePath }.map{ |f| json[f] }
    )
  end

  # {
  #   "app": "SampleAlarm",
  #   "session": "1138361025642",
  #   "response": "1112035",
  #   "response_code": "0",
  #   "ttsResponse": "triggered the alarm to snooze ",
  #   "ttsResponsePath": "http://199.19.116.98:26900/tts/383105.wav"
  # }
  Response = Struct.new(:body, :response, :tts_response, :tts_response_path)

end
