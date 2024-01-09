#!/usr/bin/perl -wT
use CGI ':standard';
use strict;
use CGI::Carp qw(warningsToBrowser fatalsToBrowser); 
use File::Basename;

my $cgi = CGI->new;

my $first_name     = $cgi->param('first');
my $last_name      = $cgi->param('last');
my $street         = $cgi->param('address');
my $city           = $cgi->param('city');
my $postal_code    = $cgi->param('postal');
my $province       = $cgi->param('province');
my $phone_number   = $cgi->param('phone');
my $email          = $cgi->param('email');

# Handling file upload
# my $filename = $cgi->param('photo');
# my $upload_dir = "/path/to/upload/directory";

my $valid          = 1;
my $error_message  = '';

if ($phone_number !~ /^\d{10}$/) {
    $valid = 0;
    $error_message .= "Invalid phone number. ";
}

if ($postal_code !~ /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/) {
    $valid = 0;
    $error_message .= "Invalid postal code format. ";
}

if ($email !~ /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/) {
    $valid = 0;
    $error_message .= "Invalid email format. ";
}


# Output the HTML header
print $cgi->header,
      $cgi->start_html(-title => 'User Registration Result', -style => {'src' => 'https://www2.cs.torontomu.ca/~jquantri/lab07b.css'});      

# Display the result
if ($valid) {
    # print "<link rel='stylesheet' type='text/css' href='http://www.cs.torontomu.ca/~jquantri/lab07b.css'>";
    print "<h2>Registration Successful</h2>";
    print "<p>First Name: $first_name</p>";
    print "<p>Last Name: $last_name</p>";
    print "<p>Address: $street</p>";
    print "<p>City: $city</p>";
    print "<p>Postal Code: $postal_code</p>";
    print "<p>Province: $province</p>";
    print "<p>Phone Number: $phone_number</p>";
    print "<p>Email: $email</p>";
    #print "<img src='$filename' width='500' height='600'></img>";
} else {
    print "<h2>Registration Failed</h2>";
    print "<p>Error: $error_message</p>";
}

print $cgi->end_html;