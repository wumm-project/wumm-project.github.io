---
layout: default
title: Vocabulary
---

# This page is under reconstruction

This is a short description of the vocabulary developed so far.

Different data is collected in different **RDF Graphs** in [Turtle
format](https://www.w3.org/TR/turtle/). Each such Graph
<http://opendiscovery.org/rdf/XXX/> is stored in a file `XXX.ttl` and
described by an `owl:Ontology` object.

For any Literal several **language versions** can be recorded. Use language tags
for different such language versions.

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

RDF Graphs and the corresponding file names usually are in plural mode, the
namespace prefix of the different subjects described in this graph are in
singular mode.

Another standard uses the prefix `The` to distiguish the names of the Graph
and the namespace prefix used for the different subjects described in this
graph.

This avoids name clashes between the name of the graph and the names of the
subjects described within that graph.

We **don't use blank nodes** since this blank nodes are valid only locally.
This would complicate the resolution of references.

## Namespaces

- cc: <http://creativecommons.org/ns#> (licensing information)
- dcterms: <http://purl.org/dc/terms/> (dublin core metadata)
- foaf: <http://xmlns.com/foaf/0.1/> (people ontology)
- ical: <http://www.w3.org/2002/12/cal/ical#> (calendar ontology)
- od: <http://opendiscovery.org/rdf/Model#> (opendiscovery model ontology)
- skos: <http://www.w3.org/2004/02/skos/core#> (knowledge meta ontology)
- swc: <http://data.semanticweb.org/ns/swc/ontology#> (conferences ontology)

## Types

### Conferences

*Description:* More detailed information about different conferences using the
swc ontology.

Each conference meta data has its own namespace prefix
<http://opendiscovery.org/rdf/Conferences/TheConferenceName/> (referenced as :
in the following) and is stored in a file `TheConferenceName.ttl` in the
`Conferences` subdirectory.

Each such graph contains a singleton swc:ConferenceEvent `:General` with meta
data about the conference as a whole.

od:Talk 
  - *Description:* Meta data about a talk presented at the conference
  - *Predicates*
    - dcterms:abstract Literal = abstract of the talk in different languages
    - dcterms:creator foaf:Person = one or more authors (references to URIs of
      the People Database)
    - dcterms:source URL = Link to some information about the talk
    - dcterms:title Literal = title of the talk in different languages
    - od:urlPaper URL = one or several links to papers related to the talk
    - od:urlSlides URL = one or several links to the slides presented in the talk
    - swc:relatedToEvent od:Track = track that the talk is scheduled for
    
swc:TrackEvent
  - *Description:* Meta data about a track at the conference
  - *Predicates*
    - rdfs:label  Literal = title of the track in different languages

### Glossary

*Description:* Glossary (label, definition, notes, examples) extracted from
the English version of the German VDI norm with (approved) German and Russian versions added.

All concepts are part of a singleton skos:ConceptScheme `theTRIZGlossary`.

od:GlossaryEntry - a subclass of skos:Concept
  - *Description:* The context for the application of a certain rule
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Context/>
  - *Predicates*
    - skos:definition Literal = definition explaining the meaning of the concept
    - skos:example Literal = example demonstrating the meaning of the concept
    - skos:inScheme skos:ConceptScheme 
    - skos:note Literal = additional note about the concept
    - skos:prefLabel Literal = label of the concept 
  
### People

*Description:* Short references about people working in the TRIZ area, mainly
required for author disambiguation.  

We strongly recommend to use the [ORCID infrastructure](https://orcid.org/) if
you plan to attach structured information about your scientific activities to
this record.

foaf:Person
  - *Description:* The person record
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Person/>
  - *Predicates*
    - foaf:affil Literal = note about the affiliation of the person
    - foaf:homepage URL = one or several links to web pages operated by the
      person 
    - foaf:name Literal = name of the person in the format "firstName
      lastName" in different language versions
    - rdfs:seeAlso ORCID-Link 

### Presentations

*Description:* DCMI Metadata records of a presentations stored in the
OpenDiscovery Database

od:Presentation
  - *Description:* The context for the application of a certain rule
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Presentation/>
  - *Predicates*
    - dcterms:creator foaf:Person = one or several authors (reference to the
      People Database) 
    - dcterms:title Literal = title in different languages
    - od:urlSlides URL = Link that points to the presentation
    - dcterms:rights Literal or URI = legal notice
    - dcterms:extent Literal = size of the presentation 
    - dcterms:format MediaType = media type as in the DCMI standard
    - dcterms:language Literal = language of the presentation using
      dcterms:RFC4646 standard  
    - dcterms:issued Literal = year of creation of the presentation using
      dcterms:W3CDTF standard. 

### StandardSolutions

tba

### ThePrinciples

tba

### TheMatrix

tba
