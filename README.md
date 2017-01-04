
# Mailtrap package for CodeIgniter PHP Framework

Curl or fsocket library for Mailtrap API to view email content, udpate and delete.

MailTrap documentation : http://docs.mailtrap.apiary.io/

## Installation

Use Composer to install this package as a requirement like this : composer require defro/codeigniter-mailtrap

Load this package by adding it to your application/config/autoload.php file like this :

`$autoload['packages'] = array(
    FCPATH . 'vendor/defro/codeigniter-mailtrap/'
);`

or include it with Loader library

`$this->load->add_package_path(FCPATH . 'vendor/joel-depiltech/codeigniter-mailtrap');`

## Usage
In your codeigniter Controller, load library
`$this->load->library('mailtrap');`
and call some methods
`$this->mailtrap->getUser();`
