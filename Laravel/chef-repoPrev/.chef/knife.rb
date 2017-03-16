log_level                :info
log_location             STDOUT
node_path                'vagrant/chef-repo/nodes'
node_name                'precise64'
client_key               '/vagrant/chef-repo/.chef/precise64.pem'
validation_client_name   'chef-validator'
validation_key           '/vagrant/chef-repo/.chef/vagrant.pem'
chef_server_url          'https://chef.precise64.net'
syntax_check_cache_path  '/vagrant/chef-repo/.chef/syntax_check_cache'
cookbook_path            '/vagrant/chef-repo/cookbooks'

