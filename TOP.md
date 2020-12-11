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

In the main paper (TOP 2020) there are explained three roles:

* __Moderator__. A TRIZ Ontology team member.  He is responsible for creating
  tasks to develop parts of the ontology by experts, as well as to monitor
  performing these tasks.
* __Expert__. A TRIZ Ontology team member.  He is responsible for creating
  ontological diagrams and their descriptions.
* __Visitor__. This is any person who is interested in the area of TRIZ
  knowledge in general and the TRIZ Ontology in particular.  A visitor can
  study ontological diagrams and their descriptions on
  <http://triz-summit.ru>, accept to participate in discussions and express
  his opinions and ratings.

At the [Webinar on December 8, 2020](2020-12-08) these roles and the all over
workflow were expanded in a little bit more detail.

1. There is a vague notion of a TRIZ Body of Knowledge (TBK) as starting point.
   * It remains vague what is the relation to earlier attempts to collect such
     a TBK in a Russian version (2007, newly released by V. Petrov in 2019)
     and an English version issued in 2012.
   * Основы знаний по ТРИЗ: Теория решения изобретательских задач.
     Author(s): Simon S. Litvin, Vladimir M. Petrov, Mikhail S. Rubin.
     Publisher: Издательские решения, 2019, ISBN: 9785449681836.
   * <https://triz-summit.ru/en/203941/>
   * TRIZ Body of Knowledge. Simon Litvin, Vladimir Petrov, Mikhail Rubin,
     Victor Fey
     <https://matriz.org/wp-content/uploads/2012/07/TRIZ-Body-of-Knowledge-final.pdf>

2. In a common process within the _Ontology Project Team_ parts of that TBK
   are identified to be modeled by a _TRIZ Expert_ as an _OntoCard_. Decision
   about the knowledge area of the ontocard and assignment to an TRIZ expert
   is due to a _coordinator_.
   * At the moment a __hierarchy of OntoCards__ is specified at
     <https://triz-summit.ru/onto_triz/>, most of the require further
     elaboration.

3. The TRIZ Expert elaborates the OntoCard content using approrpiate ontology
   modeling tools - at the moment mainly [Cmap](https://cmap.ihmc.us/).

4. The rersults are discussed and approved by the _Project Council_.

5. An _administrator_ uploads the approved material
   * to the OSA platform
   * to the Project Web site <https://triz-summit.ru/onto_triz/>.

   The WUMM TOP Companion Project uses this outcome - as far as it is
   available in machine readable form, e.g. as Excel sheet - to create another
   view on the results of modeling, using up to date semantic tools and
   concepts (as RDF, skos Ontology, RDF store, SPARQL endpoint). The aim of
   these efforts is to earn more stars for the TRIZ Ontology Project in Tim
   Berner-Lee's [5 star evaluation scheme](https://5stardata.info/en/) for
   semantic projects.

6. _Users_ can
   * inspect the published results
   * discuss and comment it   
     * This will be collected, evaluated and incorporated based on an issue
       management after a decision by the Project Council.
   * use the ontologies.

## More about the OSA platform

### How to register with the OSA platform and join the project

2010-10-21: Nikolay Shchedrin wrote

Вы сообщили, что Ваша папка на портале OSA пустая, без онтологий. Так и должно
быть. Согласно замыслу разработчиков у Вас должен быть доступ только к тем
проектам на портале (онто-картам), которые создавали Вы. Если Вы хотите изучит
карты других пользователей, то необходимо запросить ссылку к онто-карте. Обмен
ссылками возможен через групповой чат команды разработчиков онтологии ТРИЗ.

You informed us that your folder on the OSA portal is empty, without
ontologies. This is the way it should be. The intention of the developers is
that you should only have access to those projects on the portal (onto-cards)
that you created. If you want to study other users' cards, you must request a
link to the onto-card. Exchange links are available through the group chat of
the TRIZ ontology development team.

Added by HGG: See also the role of a "visitor" in the TDS 2020 paper:

> This is any person who is interested in the area of TRIZ knowledge in
> general and the TRIZ Ontology in particular. A visitor can study ontological
> diagrams and their descriptions on triz-summit.ru, accept to participate in
> discussions and express his opinions and ratings.

Hence a direct access to the ontology editor is not envisaged for that role.
You have to become a Project member to join the platform.

Nikolay informed about a web site
<https://triz-summit.ru/onto_triz/proj/instr/> with video instructions (in
Russian) how to register with OSA and start working on the project.

### What concepts are supported by the OSA platform?

The main output are Ontology Diagrams in graphics format if you know a
detailed URI, as e.g.
<https://onto.devtas.ru/new?view=c38a00d7-e97c-9648-bbc2-2af7b21d5d0e>.   

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
