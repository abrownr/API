$LOAD_PATH.unshift(File.join(File.dirname(__FILE__), '..', 'lib'))

require 'vognition'

# load pry for debugging if its available
begin
  require 'pry'
rescue; end

require 'minitest/autorun'
