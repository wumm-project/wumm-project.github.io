---
layout: default
title: Vocabulary
---

# Description of the RDF Model used in the RDFData Subproject

This is a short description of the vocabulary developed so far.  All RDF
graphs are experimentally so far and subject to future changes without notice
until a more stable version is reached.

We use the overall namespace prefix NF: <http://opendiscovery.org/rdf/>. 

Different data is collected in different **RDF Graphs** in [Turtle
format](https://www.w3.org/TR/turtle/). Each such graph *NF:XXX* is stored in
a file *XXX.ttl* and described by an *owl:Ontology* object.

RDF defines a generic concept to provide **different language versions** of
Literals using standard language tags (en - English, de - German, ru -
Russian).

We use this concept without further mentioning to compile **multilingual
versions** of different RDF graphs.

## Changelog

* 2019-07-16 graebe: First QA for the glossary finished
* 2019-07-07 graebe: TRIZ glossary added
* 2019-07-07 graebe: English and Russian versions to StandardSolutions and
  TheMatrix added
* 2019-07-06 graebe: A first version of the 76 principles added 
* 2019-07-01 graebe: Meta data of the TRIZ Summit 2019 added
* 2019-06-24 graebe: A first version of TheMatrix added 
* 2019-04-29 graebe: A first version of the Standard Solutions added
* 2019-04-29 graebe: People Database started

## Naming Conventions

RDF graphs and the corresponding file names usually are in plural mode, the
namespace prefix of the different instances described in this graph is in
singular mode.

Another standard uses the prefix *The* to distiguish the names of the graph
and the namespace prefix used for the different instances described in this
graph.

This avoids name clashes between the name of the graph and the names of the
instances described within that graph.

We **do not use blank nodes** since blank nodes are valid only locally within
the graph thus complicating the resolution of references.

## Namespaces

We use the model name space
- od: <http://opendiscovery.org/rdf/Model#> (opendiscovery model ontology)
and the following standard ontologies 
- cc: <http://creativecommons.org/ns#> (licensing information)
- dcterms: <http://purl.org/dc/terms/> (dublin core metadata)
- foaf: <http://xmlns.com/foaf/0.1/> (people ontology)
- ical: <http://www.w3.org/2002/12/cal/ical#> (calendar ontology)
- skos: <http://www.w3.org/2004/02/skos/core#> (knowledge meta ontology)
- swc: <http://data.semanticweb.org/ns/swc/ontology#> (conferences ontology)

## Types

### Conferences

*Description:* More detailed information about different conferences using the
swc ontology.

Each conference meta data has its own namespace prefix
*NF:Conferences/TheConferenceName* and is stored in a file
*TheConferenceName.ttl* in the *Conferences* subdirectory.

Each such graph contains a singleton swc:ConferenceEvent instance *General*
with meta data about the conference as a whole.

od:Talk 
  - *Description:* Meta data about a talk presented at the conference
  - *Predicates*
    - dcterms:abstract Literal = abstract of the talk
    - dcterms:creator foaf:Person = one or more authors (references to URIs of
      the People Database)
    - dcterms:source URL = Link to some information about the talk
    - dcterms:title Literal = title of the talk
    - od:urlPaper URL = one or several links to papers related to the talk    
    - od:urlSlides URL = one or several links to slides presented in the talk
    - od:urlVideo URL = one or several links to a video of the talk    
    - swc:relatedToEvent od:Track = track that the talk is scheduled for
    
swc:TrackEvent
  - *Description:* Meta data about a track at the conference
  - *Predicates*
    - rdfs:label  Literal = title of the track

### Glossary

*Description:* Glossary (label, definition, notes, examples) extracted from
the English version of the German VDI norm with German and Russian versions
added.

All concepts are related to a singleton skos:ConceptScheme *theTRIZGlossary*.

od:GlossaryEntry - a subclass of skos:Concept
  - *Description:* Description of a certain TRIZ concept
  - *Namespace prefix:* NF:Context/
  - *Predicates*
    - skos:definition Literal = definition explaining the meaning of the
      concept 
    - skos:example Literal = example demonstrating the meaning of the concept 
    - skos:inScheme skos:ConceptScheme = the related concept scheme
    - skos:note Literal = additional note about the concept
    - skos:prefLabel Literal = label of the concept 
  
### People

*Description:* Short references about people working in the TRIZ area, mainly
required for author disambiguation.  

We strongly recommend to use the [ORCID infrastructure](https://orcid.org/) if
you plan to attach more detailed structured information about your scientific
activities to this record.

foaf:Person
  - *Description:* The person record
  - *Namespace prefix:* NF:Person/
  - *Predicates*
    - foaf:affil Literal = note about the affiliation of the person
    - foaf:homepage URL = one or several links to web pages operated by the
      person 
    - foaf:name Literal = name of the person in the format "firstName
      lastName" 
    - rdfs:seeAlso ORCID-Link = the person's ORCID link

### Presentations

*Description:* DCMI Metadata records of a presentations stored in the
OpenDiscovery Database

od:Presentation
  - *Description:* (Enriched) DCMI Metadata record of a presentation
  - *Namespace prefix:* NF:Presentation/
  - *Predicates*
    - dcterms:creator foaf:Person = one or several authors (reference to the
      People Database) 
    - dcterms:title Literal = title
    - od:urlSlides URL = Link to the slides of the presentation
    - od:urlVideo URL = Link to the video of the presentation
    - dcterms:rights Literal or URI = legal notice
    - dcterms:extent Literal = size of the presentation 
    - dcterms:format MediaType = media type as one of the 
      [Media Types](https://www.iana.org/assignments/media-types/media-types.xhtml)
      standardized by the IANA
    - dcterms:language Literal = language of the presentation as defined in
      the RFC4646 standard
    - dcterms:issued Literal = year of creation of the presentation as defined
      in the W3CDTF standard. 

### StandardSolutions

*Description:* The 76 standard solutions as rooted graph of skos:Concept
instandes (label, superconcept) extracted from the (German) [TRIZ
Online](http://triz-online.de/index.php?id=5577) web site with English and
Russian versions added.

All concepts are related to a singleton skos:ConceptScheme *theTRIZStandards*.
An (empty) root concept *S_0* is added.

*Naming convention:* E.g., *Standard/S_1.2.2* follows the numeration given in
the source.  This has to be fixed to more expressive names in the future. Also
the skos:prefLabel is so far more or less a skos:summary.

od:StandardSolution - a subclass of skos:Concept
  - *Description:* Description of a standard solution concept
  - *Namespace prefix:* NF:Standard/
  - *Predicates*
    - skos:broader od:StandardSolution = the parent node of the given concept 
    - skos:example Literal = example demonstrating the meaning of the concept 
    - skos:inScheme skos:ConceptScheme = the related concept scheme
    - skos:prefLabel Literal = label of the concept (a short description

### ThePrinciples

*Description:* The 40 principles as used in the ARIZ-85C TRIZ 39x39-matrix
in English, German and Russian versions.

This has strongly to be redesigned to represent also the aspects of the
historical development of "the matrix".

*Naming convention:* So far *odp:P07* is the URI of the "principle 7" and thus
follows the numeration of a specific source.  This has to be fixed to more
expressive names in the future. Also the description has to be changed to the
SKOS ontology.

od:Principle 
  - *Description:* Description of a principle
  - *Namespace prefix:* odp: = NF:Principle/
  - *Predicates*
    - od:description Literal = description of the principle
    - od:hasPrincipleNumber Literal = the number of the principle in the 39x39
      matrix
    - rdfs:label Literal = the label

### TheMatrix

*Description:* The ARIZ-85C TRIZ 39x39-matrix in English, German and Russian
versions.

This has strongly to be redesigned to represent also the aspects of the
historical development of "the matrix".

*Naming convention:* So far Matrix/E.01.02* refers to the entry with row
number 01 and column number 02 and thus follows the numeration of a specific
source.  This has to be fixed to more expressive names in the future. Also the
description has to be changed to the SKOS ontology.

od:MatrixEntry 
  - *Description:* Description of a matrix entry
  - *Namespace prefix:* NF:Matrix/
  - *Predicates*
    - od:decreasingParameter od:Parameter = decreasing parameter
    - od:increasingParameter od:Parameter = increasing parameter
    - od:recommendedPrinciple od:Principle = recommended principle

od:Parameter
  - *Description:* Description of a parameter
  - *Namespace prefix:* odm: = NF:Parameter/
  - *Predicates*
    - od:description Literal = description of the parameter
    - od:hasParameterNumber Literal = the number of the parameter in the 39x39
      matrix
    - rdfs:label Literal = the label
