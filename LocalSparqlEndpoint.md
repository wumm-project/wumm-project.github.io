---
layout: default
title: LocalSparqlEndpoint
---

# How to Install a Local RDF Store

## Goal of this page

To operate the WUMM RDFData on a local site requires access to the data via a
web server at localhost and a Sparql endpoint.

On this page we describe how to set up your own Sparql endpoint at
<http://localhost:8890/sparql> based on Apache running under a recent Linux
Debian Ubuntu distribution.

- Tried with Debian GNU/Linux 7.0, Ubuntu 12.04.2 LTS, and Apache/2.2.22
    (Debian)

## Preliminary Remarks

There are plenty of RDF stores based on MySQL databases. Much of them are well
suited for serving WUMM RDFData, too.

Here we describe how to install an RDF infrastructure based on the more
powerful RDF Engine [Virtuoso](http://virtuoso.openlinksw.com).

Virtuoso is a commercial Database store of *Openlink Software* specially
designed to serve huge RDF data that comes with a built in Sparql endpoint.
We recommend to use the Virtuoso Open Source Distribution (VOS) bundled with
Debian.

## Install the Virtuoso engine

The virtuoso engine can easily be installed with the single command

<pre>
  sudo aptitude install virtuoso-opensource
</pre>

For security reasons during installation you will be asked for a password for
the db users 'dba' and 'dav' (default: dba). The password should match the
regex [a-zA-Z0-9]+, i.e., have only letters and ciphers.

For details see
<http://virtuoso.openlinksw.com/dataspace/doc/dav/wiki/Main/VOSUbuntuNotes>

The executables provided (in the virtuoso-opensource-6.1-bin package) are:
- /usr/bin/isql-vt -- command-line database-access tool, iSQL
- /usr/bin/isqlw-vt -- Unicode-enabled iSQL
- /usr/bin/virt\_mail -- SMTP delivery agent for incoming mail
- /usr/bin/virtuoso-t -- Main daemon executable

At server start time a Virtuoso database is started with configuration read
from /etc/virtuoso-opensource-6.1/virtuoso.ini. The default settings point to
- /var/lib/virtuoso-opensource-6.1/db/ as the directory where all data and
  logging information resides
- the DB server port 1111 to be used by the console command

<pre>
  isql-vt 1111 dba YourDBPassword
</pre>

if the daemon is running.

- the HTTP server port 8890 to be used as <http://localhost:8890> - it allows
  to manage the database via the conductor, a web interface similar to
  phpmyadmin or so - and the Sparql endpoint at
  <http://localhost:8890/sparql>.

## (Optional) Create a new Virtuoso Database and start operation

Copy /etc/virtuoso-opensource-6.1/virtuoso.ini to a fresh directory
/myPATH/myNewVDir, change all file names to local ones

<pre>
  DatabaseFile                   = virtuoso.db
  ErrorLogFile                   = virtuoso.log
  LockFile                       = virtuoso.lck 
  TransactionFile                = virtuoso.trx
  xa_persistent_file             = virtuoso.pxa
  DatabaseFile                   = virtuoso-temp.db
  TransactionFile                = virtuoso-temp.trx
</pre>

change the ports 1111 (new, e.g. 1112) and 8890 (new, e.g. 8891) to different
ones and start a new daemon with

<pre>
  cd /myPATH/myNewVDir; virtuoso-t +configfile virtuoso.ini 
</pre>

This will generate all additional files in that directory and start the
daemon. Access the database via console

<pre>
  isql-vt 1112 dba dba
</pre>

and first change the default password 'dba'

<pre>
  SQL> set password dba YourVerySecretPassword ;
</pre>

The web front end to the new database will be available at
<http://localhost:8891>.

Shut down the service from the console with

<pre>
  isql-vt 1112 dba YourVerySecretPassword
  SQL> shutdown() ;
</pre>

## Data Management

To load RDF data from the files supplied in the `rdf` directory of the `web`
git repo directly into the Virtuoso engine the following steps are required:

1) Check out the repo to /YourPathTo/web, add the path /YourPathTo/web to the
data part of the distribution to the DirsAllowed

<pre>
  DirsAllowed =., /usr/share/virtuoso-opensource-6.1/vad, /YourPathTo/web
</pre>

and restart the daemon. 

2) Load all or a part of the RDF graphs into the Virtuoso Engine. The perl
script at web/services/loaddata.pl writes the required output to stdout, that
contains a number of records like

<pre>
   sparql create silent graph <http://opendiscovery.org/rdf/People/> ; 
   DB.DBA.RDF_LOAD_RDFXML_MT (file_to_string_output('/YourPathTo/web/People.rdf'),'','http://opendiscovery.org/rdf/People/'); 
</pre>

Read that into Virtuoso using the command line tool isql-vt:

<pre>
   perl loaddata.pl | isql-vt 1111 dba YourVerySecretPassword
</pre>

3) Check success from within the console

<pre>
   isql-vt 1111 dba YourVerySecretPassword
   SQL> sparql select distinct ?s from <http://opendiscovery.org/rdf/People/> where {?s ?p ?o};
</pre>

and similar for the other graphs. The command will list you the URIs of all
instances in the given graph. Try the same at the SPARQL endpoint
<http://localhost:8890/sparql> with

<pre>
   select distinct ?s from <http://opendiscovery.org/rdf/People/> where {?s ?p ?o}
</pre>

It should list the URIs of all people stored in the WUMM People knowledge
base.  Compare your output with that from
<http://wumm.uni-leipzig.de:8891/sparql>.

## Additional remarks about Virtuoso

### More on config.ini

Adapt at least the items ServerPort in the Parameters section (default 1111),
the ServerPort in the HTTPSection (default 8890) and the DirsAllowed.
__Different databases have to use different ports__.

__DirsAllowed__ contains a comma separated list of all directories where the
service is allowed to read files. A file location in any subdirectory of the
listed directories will be accepted. It is recommended to use absolute path
names without file symlinks.

### Change the Password

Open the console

<pre>
  isql-v &lt;DBServerPort&gt; dba &lt;passwd&gt;
</pre>

and change the password (standard user = dba, passwd = dba)

<pre>
  SQL>  set password &lt;old password> &lt;new password>;
</pre>

For curious people: Direct your Browser to <http://localhost:8890>. It will
show you the Virtuoso VSP pages with a "phpmyadmin" like administration web
frontend at <http://localhost:8890/conductor>. Not required for beginners.

### Some useful commands

Shutdown the service from the console with

<pre>
   SQL> shutdown() ;
</pre>

Clear Data from a given graph:

<pre>
   SQL> sparql clear graph <http://opendiscovery.org/rdf/People/> ; 
</pre>

Graphs are not created automatically. If you have problems to display content
in Ontowiki, a command as the following may help to resolve the trouble

<pre>
   SQL> sparql create silent graph <http://opendiscovery.org/rdf/People/> ;
</pre>
