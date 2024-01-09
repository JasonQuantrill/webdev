#!/usr/bin/perl -wT
use CGI ':standard';
use strict;
print "Content-type: text/html\n\n";

print <<"HTML CODE";
<!DOCTYPE html>
<html>
<head>
    <title>Lab7</title>
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Agbalumo">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        h1 {
           font-family: "Agbalumo"; 
           color:blue;
        }
    </style>
</head>
<body>
    <h1>This is my first Perl Program</h1>
</body>
</html>
HTML CODE