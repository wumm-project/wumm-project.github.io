---
layout: default
title: WOP-General
---

# Introduction to the WUMM RDFData Subproject

* [More about the General TRIZ Ontology Project](Ontology)

We assume that you are familiar with the basic RDF concepts. Our RDF data
project __consists of several areas__
* Area of [TRIZ activities](WOP-Activities) (people, conferences,
  presentations, certificates)
* Area of [TRIZ knowledge resources](WOP-Literature) (TRIZ Body of Knowledge,
  TRIZ books)
* Area of [TRIZ ontology](WOP-Ontology) (accompanying the [TRIZ Ontology
  Project](Ontology))

Detailed explanations of our modelling concepts can be found in the following
__publications__:

* Hans-Gert Gräbe: Towards a Linked Open Data TRIZ Ontology. [LIFIS Online,
  August 13, 2021](http://dx.doi.org/10.14625/graebe_20210813).  Accepted for
  Presentation at the TRIZ Future Conference 2021.
* Hans-Gert Gräbe: About the WUMM modelling concepts of a TRIZ ontology
  ([pdf](Texts/WOP-Basics.pdf)).  Manuscript, April 2021.
* Tom Strempel, Hans-Gert Gräbe: Semantic Web Modelling of TRIZ System
  Evolution Concepts ([pdf](Texts/WOP-EvolutionTrees.pdf)).  Accepted for
  Presentation at the TRIZFest 2021.

Our RDF datasets __can be found__ in the [RDFData
repo](https://github.com/wumm-project/RDFData). For presentation and
inspection of the data we run
* a [Virtuoso](https://virtuoso.openlinksw.com/) based RDF Data Store with a
  [SPARQL endpoint](http://wumm.uni-leipzig.de:8891/sparql) and
* a prototypical [presentation site](http://wumm.uni-leipzig.de/index.php).

On this page the general settings are briefly described.

## General Settings

__1. URI and namespaces:__ For our own modelling we use the overall namespace
prefix <http://opendiscovery.org/rdf/>.

__2. Multilanguage concepts:__ RDF defines a generic concept to provide
different language versions of Literals using standard language tags (en -
English, de - German, ru - Russian).  We use this concept to compile
multilingual versions of different RDF graphs.

__3. Naming Conventions:__ RDF graphs and the corresponding file names usually
are in plural mode, the namespace prefix of the different instances described
in this graph is in singular mode.

Another standard uses the prefix *The* to distiguish the names of the graph
and the namespace prefix used for the instances described in this graph.

This avoids name clashes between the name of the graph and the names of the
instances described within that graph.

__4. Blank nodes:__ We do not use blank nodes since they are valid only
locally within the graph thus complicating the resolution of references and
refactorization.

## Namespaces

We use the following project specific name spaces
- od: <http://opendiscovery.org/rdf/Model#> - the namespace of the WUMM model
  ontology
- tc: <http://opendiscovery.org/rdf/Concept/> - the namespace for TRIZ
  concepts
- odp: <http://opendiscovery.org/rdf/Person/> - the namespace for TRIZ people

and the following standard ontologies
- bibo: <http://purl.org/ontology/bibo/> (bibliographical information)
- cc: <http://creativecommons.org/ns#> (licensing information)
- dcterms: <http://purl.org/dc/terms/> (dublin core metadata)
- foaf: <http://xmlns.com/foaf/0.1/> (people ontology)
- ical: <http://www.w3.org/2002/12/cal/ical#> (calendar ontology)
- skos: <http://www.w3.org/2004/02/skos/core#> (knowledge meta ontology)
- swc: <http://data.semanticweb.org/ns/swc/ontology#> (conferences ontology)

## Organization of the RDF Graphs in Files

Different data is collected in different **RDF Graphs** in [Turtle
format](https://www.w3.org/TR/turtle/). Each such graph
*http://opendiscovery.org/rdf/XXX* is stored in a file *XXX.ttl* and described
by an *owl:Ontology* object within this file.
