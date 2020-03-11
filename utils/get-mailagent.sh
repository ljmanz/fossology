#!/bin/bash
# Copyright (C) 2020 Lukas Manz
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# version 2 as published by the Free Software Foundation.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
#
# Description: This file checks on what distro and version we are and returns the needed MTA command.

TMP=$(which lsb_release);

if [ $? -ne 0 ]; then
    exit 1;
fi


# figure out what distro we're on
DISTRO=$(lsb_release --id --short)
CODENAME=$(lsb_release --codename --short)

case "$DISTRO" in
    Debian|Ubuntu)
       case "$CODENAME" in
         jessie)
    	     echo "heirloom-mailx"
	     ;;
         xenial|stretch|buster|bionic|sid)
             echo "s-nail"
	     ;;
         *)  echo "ERROR: distro not recognised, please fix and send a patch"; exit 1;;
       esac
       ;;
    Fedora|RedHatEnterprise*|CentOS)
    	     echo "mailx"
	     ;;
    *) echo "ERROR: distro not recognised, please fix and send a patch"; exit 1;;
esac
