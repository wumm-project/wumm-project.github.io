---
layout: default
title: TOP
---

# More Details about the TDS Summit Ontology Project

For the motivation of the project see the [Overview Page](Ontology) of the
TRIZ Ontology Project.

## Project Web Resources

* <https://triz-summit.ru/onto_triz/> - Starting page of the official web
  repository with the released results (in Russian).
* The core team uses moreover an ontology modelling platform
  [OSA](https://onto.devtas.ru/ts2o1) (the Ontology Space Agent Platform) with
  (so far) restricted access of the public.

## Project Structure and Workflow

This information was explained at the [Webinar on December 8, 2020](2020-12-08) 

to be added

## More about the OSA platform

to be added

NS: OSA has the ability to link to other platforms and portals that have open
APIs. As far as I know, to use this connection a request to the developers is
required. We will invite them to one of our sessions to report about this.

HGG: In the domain of semantic technologies exist well-established
technological standards for both data exchange formats and procedures. The
standard API for such a task is, of course, a SPARQL Endpoint. It would be
very useful if OSA would provide such an endpoint that could be used to study
the work done so far. If less, it would be sufficient to publish regularly
dumps of any part of the modelling in an established format, as this is done
in the WUMM project with its knowledge bases in the github repo
<https://github.com/wumm-project/RDFData>.

## Acknowledgement of Previous Work in the TRIZ Ontology Project

(from a mail exchange with Nikolay Shchedrin)

HGG: There are several works by Cecilia Zanni-Merk, which developed TRIZ
ontology 8...10 years ago.  What role do such early works play in the project?
* See the [Overview Page](Ontology) of the TRIZ Ontology Project for detailed
  references to that work.

NS: Unfortunately, we are not familiar with the work of Cecillia Zanni-Merk.
We started developing ontology, taking only V. Souchkov's TRIZ glossary v.1.2
as a basis.

HGG: That's a pity, because this way the developments of the latest 20 years,
especially the IDM version of TRIZ developed by Nikolay Khomenko and Denis
Cavallucci, and thus concepts such as ActionParameter, EvaluationParameter and
GeneralizedContradiction, are ignored.  In Souchkov's glossary there are no
such terms.

The main problem here is that also the basis of the modelling of functional
analysis thus remains at this level. I understand Mikhail Rubin very well when
he calls for first to reconstruct the state of TRIZ-2. But then this should be
stated clearly and not want to achieve more at the same time. The desire to
realize everything at once has always led to chaos.

Of the various glossaries, the VDI glossary is available in the WUMM project
as RDF source (based on the skos ontology) and also uploaded into the WUMM
showcase web site at <http://wumm.uni-leipzig.de>. It contains 54 terms and,
according to private communication with Valery Souchkov, covers part of his
glossary.  It would be it is useful, also to include further classification of
these terms as developed within your ontology project. But for this purpose
the data of that work must first be made publicly available.

Addendum: Meanwhile we renamed that as _Thesaurus_ in accordance with the term
used at the [GSA terms website](https://www.altshuller.ru/thesaur/thesaur.asp)
and unified that and also more information about top level ontologies and
OntoCards into a common list of terms into a [Combined TRIZ
Glossary](http://wumm.uni-leipzig.de/ontology.php).  The links in that
presentation lead to a display of parts of the stored WUMM RDF Graph in a more
complete manner that can be traversed along successor and predecessor
relations (we set up an SPARQL Endpoint for that job).

The terms are modeled as skos:Concepts, but according to the source some more
"tags" = Types are added (e.g., tc:GSAThesaurusEntry, tc:VDIGlossaryEntry).
This are subclasses of the class skos:Concept, but are concepts by themselves.

There are some upcoming tasks on that part:

(1) Consolidate the URIs of the two RDF graphs. This could easily be extended
to Souchkov's Glossary if it would be available in an more machine readable
form than pdf.

(2) Enrich it with information to which class (Basic, Rules, ...) each term
belongs and to which generation (TRIZ-1..3).
