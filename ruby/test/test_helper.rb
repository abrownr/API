$LOAD_PATH.unshift(File.join(File.dirname(__FILE__), '..', 'lib'))

require 'vognition'
require 'minitest/autorun'
require 'vcr'

# load pry for debugging if its available
begin
  require 'pry'
rescue; end

VCR.configure do |c|
  c.cassette_library_dir = 'cassettes'
  c.hook_into :faraday
end
