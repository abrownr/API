$LOAD_PATH.unshift(File.join(File.dirname(__FILE__), '..', 'lib'))

require 'vognition'
require 'minitest/autorun'
require 'vcr'
require 'json'

# load pry for debugging if its available
begin
  require 'pry'
  require 'pry-byebug'
rescue; end

VCR.configure do |c|
  c.cassette_library_dir = 'cassettes'
  c.hook_into :faraday
end
