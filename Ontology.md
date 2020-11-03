---
layout: default
title: Ontology
---

# Different activities concerning TRIZ ontology and glossary projects

Here some links to TRIZ ontology and glossary projects are collected. One of
the goals of the WUMM project is to transform that information into RDF as
__the__ machine readable standard of the Web 3.0 (also called "Semantic Web").
There are other materials, as e.g.,
* the TRIZ Inventive Standards
* the 40 Principles
* the TRIZ Body of Knowledge

that must be included into a fully fledged Ontology Project and that are
already (prototypically) transformed to the RDF format within the WUMM
project, see the [WUMM Demonstration
Site](http://wumm.uni-leipzig.de/index.php) for a first approximation.  The
main work is ahead &ndash; to agree upon a consolidated version of all that
material.

See [our more detailed description](OntologyDetails "wikilink") of the RDF
sources for an introduction to the RDF vocabulary developed so far.  Note that
this information is not necessarily up to date since we use an agile approach
to develop the RDF material.

We provide a [prototypical presentation](http://wumm.uni-leipzig.de/index.php)
of most of the RDF material collected so far as proof of the concept. 

## The TDS Summit Ontology Project (TRIZ Ontology Project for short)

### Motivation (English translation)

Source: <https://triz-summit.ru/onto_triz/>

The theory of Inventive Problem Solving (TRIZ) is an area of knowledge about
the laws and trends in the development of technical systems, methods and tools
for forecasting, identifying, analysing and solving contradictions in the
development of systems. TRIZ is based on the laws of dialectics, using
evolutionary, systematic, functional, model and other fundamental scientific
approaches. The TRIZ model includes connections between models of inventive
tasks and models of their solution, as well as models of systems with models
of their development. TRIZ reveals the regularities and methods of formation
and development of inventive thinking, methods of development of creative
imagination. TRIZ methods and tools are applicable for solving inventive tasks
not only in techniques, but also for non-technical systems. TRIZ is used in
practice for development of creative personality, solution of inventive tasks
in various fields, in innovative entrepreneurship, in solution of tasks in
enterprises.

* More about the [TDS Summit Ontology
  Project](https://triz-summit.ru/onto_triz/) (in Russian)
  * This are also the authoritative sources for the public (the "visitors") to
    get informed.    
  * The core team uses moreover an ontology modelling platform
    [OSA](https://onto.devtas.ru/ts2o1) (the Ontology Space Agent Platform)
    with (so far) restricted access of the public.
* Ontology Webinar Series Oct.-Nov. 2020 (in Russian)
  * <https://triz-summit.ru/confer/tds-2020/web/inf/> (invitation)    
  * <https://triz-summit.ru/confer/tds-2020/web/> (starting page, link to
    material presented at the different webinars)      
  * [More about the Webinar](OntologyWebinar "wikilink") in English.    

### Publications

* A. Kuryan, M. Rubin, N. Shchedrin, O. Eckardt, N. Rubina. [TRIZ Ontology.
  Current State and Perspectives](Texts/Ontology-TDS2020.pdf). TDS 2020 (in
  Russian).
  * [English translation](Texts/Ontology-TDS2020-en.pdf)
* A. Kuryan, V. Souchkov, D. Kucharavy. [Towards ontology of
  TRIZ](Texts/Ontology-TDS2019-en.pdf). Proceedings of TRIZ Developers Summit
  2019 Conference, Minsk, 2019 (in English).
* V. Souchkov. Glossary of TRIZ and TRIZ-related terms.
  Several versions since 1991.  Last version 2014.
  <http://www.xtriz.com/publications/TRIZGlossaryVersion1_0.pdf>.

### Exploration of the Data stored in OSA and Links to other Platforms

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

## Previous work

* A. Bultey, Wei Yan, C. Zanni (2015). A Proposal of a Systematic and
  Consistent Substance-field Analysis. Procedia Engineering 131, pp.
  701-710.  <https://doi.org/10.1016/j.proeng.2015.12.357>
* C. Zanni-Merk, F. D. Beuvron, F. Rousselot, Wei Yan (2013).  A formal
  ontology for a generalized inventive design methodology.  Applied Ontology,
  8 (4), pp. 231-273.  <https://doi.org/10.3233/AO-140128>.
* D. Cavallucci, F. Rousselot, C. Zanni (2011). An ontology for
  TRIZ. Proc. TRIZ Future Conference 2009. Procedia Engineering 9, 251–260.
  <https://doi.org/10.1016/j.proeng.2011.03.116>.
* C. Zanni-Merk, F. Rousselot, D. Cavallucci (2009). An Ontological Basis for
  Inventive Design. Computers in Industry, 60 (8), pp. 563-574.
* A. Bultey, F. de Bertrand de Beuvron, F. Rousselot (2007). A substance-field
  ontology to support the TRIZ thinking approach. International Journal of
  Computer Applications in Technology 30 (1), pp. 113-124.  
  <https://doi.org/10.1504/IJCAT.2007.015702>.
* S. Dubois, P. Lutz, F. Rousselot, G. Vieux (2007).  A model for problem
  representation at various generic levels to assist inventive design
  International Journal of Computer Applications in Technology 30 (1),
  pp. 105-112.  <https://doi.org/10.1504/IJCAT.2007.015701>.

### Acknowledgement of Previous Work in the TRIZ Ontology Project

HGG: There are several works by Cecilia Zanni-Merk (listed above), which
developed TRIZ ontology 8...10 years ago.  What role do such early works play
in the project?

NS: Unfortunately, we are not familiar with the work of Cecillia Zanni-Merk.
We started developing ontology, taking only TRIZ glossary (of V. Souchkov -
added by HGG) as a basis.

HGG: That's a pity, because this way the developments of the latest 20 years,
especially the IDM version of TRIZ developed by Nikolay Khomenko and Denis
Cavallucci, and thus concepts such as ActionParameter, EvaluationParameter and
GeneralizedContradiction, are ignored.  In Souchkov's glossary there are no
such terms.

The main problem here is that also the basis of the modelling of functional
analysis thus remains at this level. I understand Mikhail Rubin very well when
he calls for first to reconstruct the state of TRIZ-2. But then you have to
say that and not want to achieve more at the same time. The desire to realize
everything at once has always led to chaos.

Of the various glossaries, the VDI glossary is available in the WUMM project
as RDF source (based on the skos ontology) and also uploaded to
<http://wumm.uni-leipzig.de/glossary.php>. It contains 54 terms and, according
to private communication with Valery Souchkov, covers part of his glossary.
In ongoing work I try to make Souchkov's glossary accessible in the same way.
It would be it is useful, also to include further classification of these
terms as developed within your ontology project. But for this purpose the data
of that work must first be made publicly available.

Addendum: Meanwhile we renamed that as _Thesaurus_ in accordance with the term
used at the [GSA terms website](https://www.altshuller.ru/thesaur/thesaur.asp)
and unified that into a common list of terms into a
[Combined TRIZ Glossary](http://wumm.uni-leipzig.de/glossary.php?rdf=show). 
Souchkov's Glossary remains hard to integrate since it is not available in a
machine redable form.
