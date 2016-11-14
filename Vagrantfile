# -*- mode: ruby -*-
# vi: set ft=ruby :
$project = "gyunu"
$password = "{?quc9]xLnd:hT+("

Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/xenial64"
  config.vm.provision :shell, path: "bootstrap.sh", privileged: false, args: [$project, $password]
  config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.synced_folder ".", "/var/www/vhosts/" + $project

  config.trigger.after [:provision, :up, :reload] do
      system('echo "
        rdr pass on lo0 inet proto tcp from any to 127.0.0.1 port 80 -> 127.0.0.1 port 8080
        rdr pass on lo0 inet proto tcp from any to 127.0.0.1 port 443 -> 127.0.0.1 port 8443
        " | sudo pfctl -f - > /dev/null 2>&1; echo "==> Fowarding Ports: 80 -> 8080, 443 -> 8443"')
  end

  config.trigger.after [:halt, :destroy] do
    system("sudo pfctl -f /etc/pf.conf > /dev/null 2>&1; echo '==> Removing Port Forwarding'")
  end

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end
end
