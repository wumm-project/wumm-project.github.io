---
layout: default
title: WOP-Ontology
---

# Introduction to the WUMM RDFData on TRIZ Ontology

This page describes our RDF modelling of __TRIZ ontology__ in more detail.
General explanations of our TRIZ modelling can be found on the [introductory
page](WOP-General).

The following descriptions are yet to be fixed. 

## Glossary

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
  
## StandardSolutions

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

## ThePrinciples

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

## TheMatrix

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
