Gem::Specification.new do |s|
  s.name      = "vognition"
  s.version   = "0.1.0"
  s.date      = Time.now.strftime('%Y-%m-%d')
  s.summary   = "Wrapper for Vognition API"
  s.homepage  = "https://github.com/wrm4tech/API"
  s.email     = "carl@linkleaf.com"
  s.authors   = [ "Carl Zulauf" ]
  s.has_rdoc  = false

  s.files     = %w( README.md )
  s.files    += Dir.glob("lib/**/*")
  s.files    += Dir.glob("test/**/*")

  s.add_dependency "faraday"

  s.description = "Expose Redis data types as close to native Ruby types as possible."
end
