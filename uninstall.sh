#!/bin/bash
sudo echo "";

uncuentas(){
echo "Uninstalling Cuentas"

if [ -d /usr/share/cuentas ] ; then
rm -R /usr/share/cuentas &
fi

if [ -d /opt/cuentas ] ; then
rm -R /opt/cuentas &
fi

if [ -e /etc/cron.d/cuentas ] ; then
rm /etc/cron.d/cuentas
fi

if [ -e /usr/share/applications/cuentas.desktop ] ; then
rm /usr/share/applications/cuentas.desktop
fi

if [ -e /usr/share/applications/cuentas-uninstall.desktop ] ; then
rm /usr/share/applications/cuentas-uninstall.desktop
fi

if [ -e /etc/apache2/conf-enabled/cuentas.conf ] ; then
rm  /etc/apache2/conf-enabled/cuentas.conf
fi

if [ -e /etc/apache2/conf-enabled/cuentashlsweb.conf ] ; then
rm  /etc/apache2/conf-enabled/cuentashlsweb.conf
fi


if [ -e /etc/apache2/conf-available/cuentas.conf ] ; then
rm  /etc/apache2/conf-available/cuentas.conf
fi

if [ -e /etc/apache2/conf-available/cuentashlsweb.conf ] ; then
rm  /etc/apache2/conf-available/cuentashlsweb.conf
fi

if [ -e /etc/apache2/conf.d/cuentas.conf ] ; then
rm  /etc/apache2/conf.d/cuentas.conf
fi

if [ -e /etc/apache2/conf.d/cuentashlsweb.conf ] ; then
rm  /etc/apache2/conf.d/cuentashlsweb.conf
fi

if [ -e /etc/httpd/conf.d/cuentas.conf ] ; then
rm  /etc/httpd/conf.d/cuentas.confconf
fi

if [ -e /etc/httpd/conf.d/cuentashlsweb.conf ] ; then
rm  /etc/httpd/conf.d/cuentashlsweb.conf
fi

if [ -e /etc/httpd/conf.d/rewrite_cuentas.conf ] ; then
rm  /etc/httpd/conf.d/rewrite_cuentas.conf
fi

if [ -d /etc/cuentas ] ; then
rm -R /etc/cuentas
fi

sudo update-rc.d cuentas-daemon remove
sudo rm /etc/init.d/cuentas-daemon > /dev/null


echo "Configuring Apache";
		# Reload webserver in any case, configuration might have changed
		# Redirection of 3 is needed because Debconf uses it and it might 
		# be inherited by webserver. See bug #446324.
       	if [ -f /etc/init.d/apache2 ] ; then
		#configuracion para los distros con apache2
		  if [ -x /usr/sbin/invoke-rc.d ]; then
                invoke-rc.d apache2 reload 3>/dev/null || true
            else
                /etc/init.d/apache2 reload 3>/dev/null || true
            fi
		
	elif [ -f /etc/init.d/httpd] ; then
		#configuracion para los distros con httpd
		  if [ -x /usr/sbin/invoke-rc.d ]; then
                invoke-rc.d httpd reload 3>/dev/null || true
            else
                /etc/init.d/httpd reload 3>/dev/null || true
            fi
	fi
echo "Apache configuration has finished";
echo "IpTV has been Uninstalled";
}

echo "Really want to uninstall IpTV (yes/no)[no]"
read option
if [ "$option" = "yes" ] || [ "$option" = "y" ]; then

uncuentas

else

echo "Operation canceled"

fi


exit 0
