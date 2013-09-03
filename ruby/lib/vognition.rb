require 'faraday'

class Vognition

  def initialize
    @options = {}
    yield self if block_given?
  end

  %w{
    application_key
    application_secret
    consumer_key
    consumer_secret
    host
    port
  }.each do |field|

    # getters
    define_method(field) do
      instance_variable_get(:@options)[field]
    end

    # setters
    define_method("#{field}=") do |value|
      options = instance_variable_get(:@options)
      options[field] = value
    end
  end
end
