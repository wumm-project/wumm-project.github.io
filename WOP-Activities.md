---
layout: default
title: WOP-Activities
---

# Introduction to the WUMM RDFData on TRIZ Activities

This page describes our RDF modelling of __TRIZ activities__ in more detail.
General explanations of our TRIZ modelling can be found on the [introductory
page](WOP-General).

## Conferences

*Description:* More detailed information about different conferences using the
swc ontology.

The data consists of two RDF graphs _ConferenceSeries_ and _PastConferences_
with summary information about conferences and conference series and more
detailed information about selected conferences that are contained in single
files in the _Conferences_ directory.

### Conference Series

od:ConferenceSeries
  - *File:* ConferenceSeries.ttl
  - *Namespace*: http://opendiscovery.org/rdf/ConferenceSeries/
  - *Predicates*:
    - rdfs:label Literal = title
    - rdfs:seeAlso URL = link to the conference series site
    - od:description Literal = description 

### Conference Summaries

swc:ConferenceEvent 
  - *File:* PastConferences.ttl
  - *Namespace*: http://opendiscovery.org/rdf/Conferences/
  - *Predicates*:
    - od:toConferenceSeries od:ConferenceSeries = Link to conference series 
    - rdfs:label Literal = title
    - ical:summary Literal = summary about the conference
    - ical:description Literal = description of the conference
    - ical:dtend xsd:Date = end date
    - ical:dtstart xsd:Date = start date
    - ical:location Literal = location of the conference
    - od:detailedReport swc:ConferenceEvent = Link to a detailed conference
      report   
    - ical:url URL = link to the conference web site
    - od:theProceedings URL = link to the conference proceedings in the web

### Conference Details

Each conference meta data has its own namespace prefix
*http://opendiscovery.org/rdf/Conferences/TheConferenceName* (the same as used
for the conference summary) and is stored in a file *TheConferenceName.ttl* in
the *Conferences* subdirectory.

Each such graph contains a singleton swc:ConferenceEvent instance *General*
with meta data about the conference as a whole.

swc:ConferenceEvent
  - *Predicates*:
    - od:toConferenceSeries od:ConferenceSeries = Link to conference series 
    - rdfs:label Literal = title
    - bibo:issn Literal = ISSN of the conference publication in a journal
    - bibo:isbn Literal = ISBN of the conference proceedings
    - ical:summary Literal = summary about the conference
    - ical:description Literal = description of the conference
    - ical:dtend xsd:Date = end date
    - ical:dtstart xsd:Date = start date
    - ical:location Literal = location of the conference
    - ical:url URL = link to the conference web site
    - od:theProceedings URL = link to the conference proceedings in the web

od:Paper 
  - *Description:* Meta data about a paper presented at the conference
  - *Namespace*: conference specific
  - *Predicates*
    - dcterms:title Literal = title of the paper
    - dcterms:creator foaf:Person = author(s) of the paper (references to URIs
      of the People Database)

od:Talk 
  - *Description:* Meta data about a talk presented at the conference
  - *Predicates*
    - dcterms:abstract Literal = abstract of the talk
    - dcterms:creator foaf:Person = one or more authors (references to URIs of
      the People Database)
    - dcterms:source URL = Link to some information about the talk
    - dcterms:title Literal = title of the talk
    - od:presentedBy od:Person = who presented the talk (if more that one
      author)    
    - od:urlPaper URL = one or several links to papers related to the talk   
    - od:urlSlides URL = one or several links to slides presented in the talk
    - od:urlVideo URL = one or several links to a video of the talk    
    - swc:relatedToEvent od:Track = track that the talk is scheduled for
    
swc:TrackEvent
  - *Description:* Meta data about a track at the conference
  - *Predicates*
    - rdfs:label Literal = title of the track
  
## People

*Description:* Short references about people working in the TRIZ area, mainly
required for author disambiguation.  

We strongly recommend to use the [ORCID infrastructure](https://orcid.org/) if
you plan to attach more detailed structured information about your scientific
activities to this record.

foaf:Person
  - *File:* People.ttl
  - *Description:* The person record
  - *Namespace prefix:* http://opendiscovery.org/rdf/Person/
  - *URI rule*: LastName_I with I=Initials of all firstNames
    - This is a problem in particular for asian names since the native order
      "lastName firstName" is in many cases changed due to adoption of
      European norms to "firstName lastName" and the URI is compiled in a
      wrong way.  This will be corrected in each single case (in all instances
      of our RDF data base) if we get aware of that.
  - *Predicates*  
    - foaf:affil Literal = note about the affiliation of the person (usually
      town, country in Latin transcription)
    - foaf:fullname Literal = Russian version of the name in the format
      "lastName firstName fathersName" if applicable    
    - foaf:homepage URL = one or several links to web pages operated by the
      person 
    - foaf:name Literal = name of the person in the format "firstName
      lastName" (Latin transcription)      
      - We try to compile asian names in its native order "lastName
        firstName".      
    - rdfs:seeAlso ORCID-Link = the person's ORCID link

### MATRIZ Certificates

This record is compiled (last update 2021-02-12) from the list of MATRIZ
certificates published at <http://matriz.org>. 

tc:MATRIZCertificate
  - *File:* AllMATRIZCertificates.ttl
  - *Description:* The certificates of level 1..5 issued by MATRIZ 
  - *Namespace prefix:* http://opendiscovery.org/rdf/Certificate/
  - *URI rule*: the Certificate Id (prefixed by 5_ for level 5 certificates to
     avoid clashes with the level 4 Id's)
  - *Predicates*
    - foaf:name Literal = name as in the list
      - The list contains in many cases Russian and Latin versions, both are
      	subsumed under this predicate, Russian transcriptions are marked with
      	a language tag.
   - od:fromCountry Literal = country in Latin transciption "Russia";
   - od:theLevel od:CertificateLevel = the level as URI
   - od:hasCertificateId Literal = the Id according to the list

## Presentations

*Description:* DCMI Metadata records of a presentation that is free online
available.

od:Presentation
  - *File:* Presentations.ttl
  - *Description:* (Enriched) DCMI Metadata record of a presentation
  - *Namespace prefix:* http://opendiscovery.org/rdf/Presentation/
  - *Predicates*
    - dcterms:creator foaf:Person = one or several authors (reference to the
      People Database) 
    - dcterms:title Literal = title
    - od:urlSlides URL = Link to the slides of the presentation
    - od:urlVideo URL = Link to the video of the presentation
    - dcterms:rights Literal or URI = legal notice
    - dcterms:extent Literal = size of the presentation
    - dcterms:format MediaType = media type as one of the Media Types
      standardized by the IANA      
    - dcterms:language Literal = language of the presentation as defined in
      the RFC4646 standard
    - dcterms:issued Literal = year of creation of the presentation as defined
      in the W3CDTF standard. 
