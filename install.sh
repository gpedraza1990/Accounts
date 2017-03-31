#!/bin/bash

cd `dirname $0`
WDIR=`pwd`

if [ "$(whoami)" != "root" ]; then
	echo "Root permissions are required";
	exit 1;
fi

#preinstall
if [ "$1" != "update" ]; then
	if [ -d /usr/share/cuentas ] ; then
		echo "IPTV is installed , you want to replace?(yes/no)[yes]"
		read option
		if [ "$option" = "no" ] || [ "$option" = "n" ]; then
		echo "Operation canceled"
		exit 0;
		fi
	fi
fi

sudo yum -y install redhat-lsb-core-4.1-24.el7.i686 >/tmp/log 2>&1
sudo apt-get -y install lsb_release>/tmp/log 2>&1
dist=`lsb_release -si`

#cleaning

if [ -d /usr/share/cuentas ] ; then
sudo rm -fr /usr/share/cuentas/ ;
fi

if [ -d /opt/cuentas ] ; then
sudo rm -fr /opt/cuentas/ ;
fi

if [ -d /usr/share/wbt_output ] ; then
rm -fr /usr/share/wbt_output ;
fi

if [ -e /usr/share/applications/cuentas.desktop ] ; then
sudo rm /usr/share/applications/cuentas.desktop
fi

if [ -e /usr/share/applications/cuentas-uninstall.desktop ] ; then
sudo rm /usr/share/applications/cuentas-uninstall.desktop
fi

if [ -e /etc/apache2/conf-available/cuentas.conf ] ; then
sudo rm  /etc/apache2/conf-available/cuentas.conf
fi

if [ -e /etc/apache2/conf-enabled/cuentas.conf ] ; then
sudo rm  /etc/apache2/conf-enabled/cuentas.conf
fi

if [ -e /etc/apache2/conf.d/cuentas.conf ] ; then
sudo rm  /etc/apache2/conf.d/cuentas.conf
fi

if [ -e /etc/httpd/conf.d/cuentas.conf ] ; then
sudo rm  /etc/httpd/conf.d/cuentas.conf
fi

if [ -e /etc/httpd/conf.d/rewrite_cuentas.conf ] ; then
rm  /etc/httpd/conf.d/rewrite_cuentas.conf
fi

if [ -d /etc/cuentas ] ; then
sudo rm -fr /etc/cuentas/ ;
fi


#installing

echo "installing core"

sudo rm -fr /usr/share/cuentas ;
sudo cp -fr $WDIR /usr/share/cuentas ;

if [ -d /var/www/html ] ; then
sudo cp -f /usr/share/cuentas/web/iptvhls/crossdomain.xml /var/www/html/crossdomain.xml;
sudo chmod -f 777 /var/www/html/crossdomain.xml
else
sudo cp -f /usr/share/cuentas/web/iptvhls/crossdomain.xml /var/www/crossdomain.xml;
sudo chmod -f 777 /var/www/crossdomain.xml
fi


echo "checking dependencies";

if [ "$dist" = "Ubuntu" ] || [ "$dist" = "Debian" ] || [ "$dist" = "Mint" ] || [ "$dist" = "LinuxMint" ]; then
	sudo apt-get -y install build-essential libpcre3 libpcre3-dev libssl-dev vnstat

	pkg2=`whereis apache2 | awk '{print $2}'`
	njs=`whereis nodejs | awk '{print $2}'`
	pkg3=`whereis mysql | awk '{print $2}'`
	pkg4=`dpkg --get-selections php5-json | awk '{print $2}'`
	pkg41=`dpkg --get-selections php5-common | awk '{print $2}'`
	pkgphp5=`whereis php5 | awk '{print $2}'`

	if [ "$pkg2" != "/usr/local/bin/apache2" ] && [ "$pkg2" != "/usr/sbin/apache2" ] && [ "$pkg2" != "/usr/bin/apache2" ]; then
		if `apt-cache show apache2>/dev/null`;then
			echo "apache2 is required and is not installed"
			echo "will be installed apache2"
			echo "installing apache2"
			sleep 1
			sudo apt-get -y install apache2
		else
			echo "Dependencies error apache2 package not found"
			exit 0
		fi
	fi
	if [ "$njs" != "/usr/local/bin/nodejs" ] && [ "$njs" != "/usr/sbin/nodejs" ] && [ "$njs" != "/usr/bin/nodejs" ]; then
		if `apt-cache show nodejs >/dev/null`;then
			echo "nodejs is required and is not installed"
			echo "will be installed nodejs"
		echo "installing nodejs"
			sleep 1
			sudo apt-get -y install nodejs npm
                        sudo ln -sf "$njs" /usr/bin/node
		else
			echo "Dependencies error nodejs package not found"
			exit 0
		fi
	fi
	if [ "$pkgphp5" != "/usr/local/bin/php5" ] && [ "$pkgphp5" != "/usr/sbin/php5" ] && [ "$pkgphp5" != "/usr/bin/php5" ]; then
		if `apt-cache show php5>/dev/null`;then
			echo "php5 is required and is not installed"
			echo "will be installed php5"
			echo "installing php5"
			sleep 1
			sudo apt-get -y install php5
		else
			echo "Dependencies error php5 package not found"
			exit 0
		fi
	fi

        sudo apt-get -y install php5-curl
        sudo apt-get -y install php5-mysql
        sudo apt-get -y install php5-mcrypt
        sudo apt-get -y install php5-intl
        sudo apt-get -y install php5-exactimage
        sudo apt-get -y install php5-gd
        sudo apt-get -y install php5-memcache memcached

	if [ "$pkg3" != "/usr/local/bin/mysql" ] && [ "$pkg3" != "/usr/sbin/mysql" ] && [ "$pkg3" != "/usr/bin/mysql" ]; then
		if `apt-cache show mysql-server>/dev/null`;then
			echo "mysql-server is required and is not installed"
			echo "will be installed mysql-server"
			echo "installing mysql-server"
			sleep 1
			sudo apt-get -y install mysql-server
		else
			echo "Dependencies error mysql-server package not found"
			exit 0
		fi
	fi
	if [ "$pkg4" != "install" ]; then
		if `apt-cache show php5-json>/dev/null`;then
			echo "php5-json is required and is not installed"
			echo "will be installed php5-json"
			echo "installing php5-json"
			sleep 1
			sudo apt-get -y install php5-json
		else
			if [ "$pkg41" != "install" ]; then
				if `apt-cache show php5-common>/dev/null`;then
					echo "php5-json is required and is not installed"
					echo "will be installed php5-json"
					echo "installing php5-json"
					sleep 1
					sudo apt-get -y install php5-common
				else
					echo "Dependencies error php5-json package not found"
					exit 0
				fi
			fi
		fi
	fi

	
fi


mysqllogin(){
	echo "Need root password for MYSQL"
		echo -n "Password: "
		stty -echo
		read PASS
		stty echo
		echo ""
	if [ "$PASS" != "" ];then
	if [ "`mysqlcheck -uroot -p$PASS --all-databases`" = "" ];then
			mysqllogin
		fi
	else
		mysqllogin
	fi
}




#post install
mysqllogin

mysqladmin -f -uroot -p$PASS drop cuentas > /dev/null 2>&1


mysql -u root -p$PASS -h localhost -e "GRANT ALL PRIVILEGES  ON * . * TO 'cuentas'@'localhost' IDENTIFIED BY 'cuentas';CREATE DATABASE IF NOT EXISTS cuentas DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci; GRANT ALL PRIVILEGES ON cuentas . * TO 'cuentas'@'localhost';GRANT SELECT,INSERT,UPDATE,DELETE ON cuentas.* TO 'cuentas'@'localhost';"


mysql -uroot -p$PASS -h localhost cuentas < /usr/share/cuentas/db/cuentas.sql > /dev/null 2>&1




echo "Configuring Apache";

	sudo mkdir -p /etc/cuentas
	sudo cp /usr/share/cuentas/apache.conf /etc/cuentas/
	sudo cp /usr/share/cuentas/hlsweb.conf /etc/cuentas/
	sudo rm -f /usr/share/cuentas/apache.conf
	sudo rm -f /usr/share/cuentas/hlsweb.conf
        sudo chmod -R 755 /etc/cuentas/

	sudo php /usr/share/cuentas/install.php &

	if [ -d /etc/apache2 ] ; then
		#configuracion para los distros con apache2
		sudo mkdir -p /etc/apache2/conf-available ;

		sudo ln -sf /etc/cuentas/apache.conf /etc/apache2/conf-available/cuentas.conf > /dev/null 2>&1;
		sudo ln -sf /etc/cuentas/hlsweb.conf /etc/apache2/conf-available/cuentashlsweb.conf > /dev/null 2>&1;

        sudo ln -sf /etc/apache2/mods-available/rewrite.load  /etc/apache2/mods-enabled/rewrite.load > /dev/null 2>&1;

		COMMON_STATE=$(dpkg-query -f '${Status}' -W 'apache2.2-common' 2>/dev/null | awk '{print $3}' || true)

		if [ -e /usr/share/apache2/apache2-maintscript-helper ] ; then
			sudo ln -sf /etc/apache2/conf-available/cuentas.conf /etc/apache2/conf-enabled/cuentas.conf > /dev/null 2>&1;
			sudo ln -sf /etc/apache2/conf-available/cuentashlsweb.conf /etc/apache2/conf-enabled/cuentashlsweb.conf > /dev/null 2>&1;

		elif [ "$COMMON_STATE" = "installed" ] || [ "$COMMON_STATE" = "unpacked" ] ; then

			[ -d /etc/apache2/conf.d/ ] && [ ! -L /etc/apache2/conf.d/cuentas.conf ] && ln -s ../conf-available/cuentas.conf /etc/apache2/conf.d/cuentas.conf > /dev/null 2>&1
			[ -d /etc/apache2/conf.d/ ] && [ ! -L /etc/apache2/conf.d/cuentashlsweb.conf ] && ln -s ../conf-available/cuentashlsweb.conf /etc/apache2/conf.d/cuentashlsweb.conf > /dev/null 2>&1
		fi

	elif [ -d /etc/httpd] ; then
		#configuracion para los distros con httpd
		if [ -d /etc/httpd/conf.d ] && [ ! -e /etc/httpd/conf.d/cuentas.conf ]; then
		sudo ln -sf /etc/cuentas/apache.conf /etc/httpd/conf.d/cuentas.conf > /dev/null 2>&1
                sudo touch /etc/httpd/conf.d/rewrite_cuentas.conf
                echo "LoadModule rewrite_module modules/mod_rewrite.so" > /etc/httpd/conf.d/rewrite_cuentas.conf
    		fi
		if [ -d /etc/httpd/conf.d ] && [ ! -e /etc/httpd/conf.d/cuentashlsweb.conf ]; then
		sudo ln -sf /etc/cuentas/hlsweb.conf /etc/httpd/conf.d/cuentashlsweb.conf > /dev/null 2>&1
                sudo touch /etc/httpd/conf.d/rewrite_cuentas.conf
                echo "LoadModule rewrite_module modules/mod_rewrite.so" > /etc/httpd/conf.d/rewrite_cuentas.conf
    		fi
	fi
	sudo cp /usr/share/cuentas/cuentas.desktop /usr/share/applications/
	sudo chmod 755 /usr/share/applications/cuentas.desktop
	sudo rm /usr/share/cuentas/cuentas.desktop
	sudo cp /usr/share/cuentas/cuentas-uninstall.desktop /usr/share/applications/
	sudo chmod 755 /usr/share/applications/cuentas-uninstall.desktop
	sudo rm /usr/share/cuentas/cuentas-uninstall.desktop


		# Reload webserver in any case, configuration might have changed
		# Redirection of 3 is needed because Debconf uses it and it might
		# be inherited by webserver. See bug #446324.
       	if [ -f /etc/init.d/apache2 ] ; then
		#configuracion para los distros con apache2
		  if [ -x /usr/sbin/invoke-rc.d ]; then
               sudo  invoke-rc.d apache2 reload 3>/dev/null || true
            else
               sudo  /etc/init.d/apache2 reload 3>/dev/null || true
            fi

	elif [ -f /etc/init.d/httpd] ; then
		#configuracion para los distros con httpd
		  if [ -x /usr/sbin/invoke-rc.d ]; then
               sudo  invoke-rc.d httpd reload 3>/dev/null || true
            else
                sudo /etc/init.d/httpd reload 3>/dev/null || true
            fi
	fi


sudo /etc/init.d/cron restart > /dev/null 2>&1;

echo "starting daemon"

# sudo rm -f /usr/share/cuentas/install.php
# sudo rm -f /usr/share/cuentas/install.sh



sudo chmod -R 777 /usr/share/cuentas;

echo "You can access to the system in this Url: http://localhost/cuentas";
echo "To unintall Cuentas run this command: /usr/share/cuentas/uninstall.sh"