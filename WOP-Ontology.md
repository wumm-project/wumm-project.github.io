---
layout: default
title: WOP-Ontology
---

# Introduction to the WUMM RDFData on TRIZ Ontology

This page describes our RDF modelling of __TRIZ ontology__ in more detail.
General explanations of our TRIZ modelling can be found on the [introductory
page](WOP-General).

The basis of the ontology modelling is the [SKOS
ontology](https://www.w3.org/TR/skos-primer/), which allows to model the
relationships in conceptual systems in a lightweight way. In order to
distinguish the provenance of individual definitions, annotations and
examples, different sub-predicates of the relevant SKOS predicates are used.

## Texts

* Hans-Gert Gräbe (2021). The WUMM Project on a TRIZ Ontology. Basic Concepts.
  ([pdf](Texts/Graebe/WOP-Basics.pdf)).
* Tom Strempel (2021). A Proposal for Modelling TRIZ System Evolution
  Concepts.  ([pdf](Texts/Graebe/WOP-EvolutionTrees.pdf)).

## Glossaries

SKOS offers the possibility to display several glossaries side by side by
compiling the different explanations in different RDF graphs relating them to
the same URI. These can then be compared in more detail in a _Combined
Glossary_, which is compiled from these RDF graphs in our RDF Store. See the
prototypical implementation of a [Combined
Glossary](http://wumm.uni-leipzig.de/ontology.php) in our demo website.

The included concepts all have URIs from the common namespace tc: and the RDF
Type _skos:Concept_.  In addition, the concepts are assigned to another
subtype of _skos:Concept_ according to their provenance.

The predicates _skos:prefLabel_ and _skos:altLabel_ are used for the labels of
the concepts according to the RDF multilinguality concept.  This allows SPARQL
queries to search for labels in selected languages.

Currently the following glossaries are covered:
* The GSA TRIZ thesaurus <https://www.altshuller.ru/thesaur/thesaur.asp> - a
  large multilingual thesaurus of TRIZ concepts (Thesaurus.ttl)
* The glossary of V. Souchkov (v. 1.2) - Souchkov-Glossary.ttl
* The TRIZ-100 glossary of the TRIZ Ontology Project - TOP-Glossary.ttl
* The glossary published with the German TRIZ VDI norm 4521 - VDI-Glossary.ttl
* A glossary published by (Lippert/Cloutier 2019) - Lippert-Glossary.ttl
* A glossary published by N.N. Matvienko - Matvienko-Glossary.ttl

__Predicates__ of a typical entry
- rdf:Type = skos:Concept
  - subtypes od:GSAThesaurusEntry, od:LippertGlossaryEntry,
    od:MatvienkoGlossaryEntry, od:SouchkovGlossaryEntry, od:VDIGlossaryEntry
- skos:prefLabel Literal = (preferred) name of the concept (multilingual)
- skos:altLabel Literal = alternative name of the concept, synonyms
- skos:definition Literal = definition of the concept
  - subpredicates od:SouchkovDefinition, od:VDIGlossaryDefinition
- skos:example Literal = example explaining the concept 
  - subpredicates od:SouchkovExample
- skos:note Literal = note explaining a concept
  - subpredicates od:hasLippertNote

__Concept relations__
- skos:narrower = subconcept relation (A skos:narrower B means that A is a
  subconcept of B)
  - subpredicates od:SouchkovCategory
  
## Inventive Standards

### Classical Standards

*Description:* The inventive standards as rooted graph extracted from the
(German) [TRIZ Online](http://triz-online.de/index.php?id=5577) web site with
English and Russian versions added.

An (empty) root concept *S_0* is added.

*Naming convention:* E.g., *Standard/S_1.2.2* follows the numeration given in
the source.  This has to be fixed to more expressive names in the future. Also
the skos:prefLabel is so far more or less a skos:summary.

od:StandardSolution 
  - *File:* StandardSolutions.ttl
  - *Description:* The 76 inventive standards
  - *Namespace prefix:* http://opendiscovery.org/rdf/Standard/
  - *Predicates*
    - skos:broader od:StandardSolution = the parent node of the given concept 
    - skos:example Literal = example demonstrating the meaning of the concept
    - skos:prefLabel Literal = label of the concept (a short description of
      the standard)

### Separation Principles

These are closely linked to the standards, see for example (Koltze/Souchkov
2017, 4.3.5) and therefore modelled as generalisations of the standards.

od:SeparationPrinciple 
  - *File:* SeparationPrinciples.ttl
  - *Description:* The 4 separation principles
  - *Namespace prefix:* tc:
  - *Predicates*
    - skos:definition Literal = description of the principle
    - skos:narrower od:StandardSolution = related inventive standards
    - skos:prefLabel Literal = label of the concept 

### Business Standards

Business Standard Solutions proposed by Valeri Souchkov

od:TRIZ_Standard
  - *File:* BusinessStandards.ttl
  - *Description:* a business standard
  - *Namespace prefix:* http://opendiscovery.org/rdf/BusinessStandard/
  - *Predicates*
    - skos:narrower od:TRIZ_StandardGroup = the standard group of that
      standard
    - skos:prefLabel Literal = label of the concept 

od:TRIZ_StandardGroup
  - *File:* BusinessStandards.ttl
  - *Description:* a group of business standards
  - *Namespace prefix:* http://opendiscovery.org/rdf/BusinessStandard/
  - *Predicates*
    - skos:prefLabel Literal = label of the concept 

## Principles

*Description:* The principles used in different versions of the matrix.

od:Principle 
  - *File:* Principles.ttl
  - *Namespace prefix:* tc:
  - *Predicates*
    - skos:prefLabel Literal = label of the principle 
    - skos:note Literal = note explaining the principle
      - subpredicates od:LippertGlossaryNote      
    - od:hasAltshuller73Id xsd:integer = number of the principle in
      (Altshuller 1973)
    - od:hasAltshuller84Id xsd:integer = number of the principle in
      (Altshuller 1984)
    - od:hasRecommendation od:Recommentation = recommentations for that
      principle

od:Recommendation
  - *File:* Principles.ttl
  - *Namespace prefix:* tc:
  - *Predicates*
    - od:description Literal = description of the principle

## Matrix1985

*Description:* The ARIZ-85C TRIZ 39x39-matrix in English, German and Russian
versions.

For each entry, the deteriorating and improving technical paramaters are
linked to the URIs of the recommended principles from Principles.ttl via the
corresponding URIs from Parameters.ttl.

od:MatrixEntry 
  - *File:* Matrix1985.ttl
  - *Namespace prefix:* http://opendiscovery.org/rdf/Matrix/E.
  - *Predicates*
    - od:decreasingParameter od:Parameter = decreasing parameter
    - od:increasingParameter od:Parameter = increasing parameter
    - od:recommendedPrinciple od:Principle = recommended principle

### Parameters

Parameters used in the different versions of the matrix

od:Parameter
  - *File:* Paramters.ttl
  - *Namespace prefix:* tc:
  - *Predicates*
    - skos:prefLabel Literal = label of the parameter
    - skos:definition Literal = definition of the parameter
    - od:hasParameterNumber xsd:integer = number of the parametern in
      (Altshuller 1984)
