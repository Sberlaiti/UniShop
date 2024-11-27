<?xml version="1.0" encoding="UTF-8"?>
<?PowerDesigner AppLocale="UTF16" ID="{3991296E-D663-42DC-B2E6-4158D167AC1A}" Label="" LastModificationDate="1728570027" Name="UniShop_DCL" Objects="48" Symbols="8" Target="Analyse" TargetLink="Reference" Type="{18112060-1A4B-11D1-83D9-444553540000}" signature="CLD_OBJECT_MODEL" version="15.1.0.2850"?>
<!-- Veuillez ne pas modifier ce fichier -->

<Model xmlns:a="attribute" xmlns:c="collection" xmlns:o="object">

<o:RootObject Id="o1">
<c:Children>
<o:Model Id="o2">
<a:ObjectID>3991296E-D663-42DC-B2E6-4158D167AC1A</a:ObjectID>
<a:Name>UniShop_DCL</a:Name>
<a:Code>UniShop_DCL</a:Code>
<a:CreationDate>1728567010</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569975</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:PackageOptionsText>[FolderOptions]

[FolderOptions\Class Diagram Objects]
GenerationCheckModel=Yes
GenerationPath=
GenerationOptions=
GenerationTasks=
GenerationTargets=
GenerationSelections=</a:PackageOptionsText>
<a:ModelOptionsText>[ModelOptions]

[ModelOptions\Cld]
CaseSensitive=No
DisplayName=Yes
EnableTrans=No
EnableRequirements=No
ShowClss=No
DeftAttr=int
DeftMthd=
DeftParm=int
DeftCont=
DomnDttp=Yes
DomnChck=No
DomnRule=No
SupportDelay=No
PreviewEditable=Yes
AutoRealize=No
DttpFullName=Yes
DeftClssAttrVisi=private
VBNetPreprocessingSymbols=
CSharpPreprocessingSymbols=

[ModelOptions\Cld\NamingOptionsTemplates]

[ModelOptions\Cld\ClssNamingOptions]

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG]

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN]

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS]

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDINTF]

[ModelOptions\Cld\ClssNamingOptions\CLDINTF\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDINTF\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDACTR]

[ModelOptions\Cld\ClssNamingOptions\UCDACTR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDACTR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS]

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT]

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG]

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP]

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDATTR]

[ModelOptions\Cld\ClssNamingOptions\CLDATTR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDATTR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD]

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPARM]

[ModelOptions\Cld\ClssNamingOptions\CLDPARM\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPARM\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPORT]

[ModelOptions\Cld\ClssNamingOptions\OOMPORT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPORT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPART]

[ModelOptions\Cld\ClssNamingOptions\OOMPART\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPART\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDASSC]

[ModelOptions\Cld\ClssNamingOptions\CLDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDASSC]

[ModelOptions\Cld\ClssNamingOptions\UCDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK]

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RQLINK]

[ModelOptions\Cld\ClssNamingOptions\RQLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RQLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK]

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK]

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMACTV]

[ModelOptions\Cld\ClssNamingOptions\OOMACTV\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMACTV\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\ACDOBST]

[ModelOptions\Cld\ClssNamingOptions\ACDOBST\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\ACDOBST\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\STAT]

[ModelOptions\Cld\ClssNamingOptions\STAT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\STAT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDNODE]

[ModelOptions\Cld\ClssNamingOptions\DPDNODE\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDNODE\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI]

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDASSC]

[ModelOptions\Cld\ClssNamingOptions\DPDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMVAR]

[ModelOptions\Cld\ClssNamingOptions\OOMVAR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMVAR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FILO]

[ModelOptions\Cld\ClssNamingOptions\FILO\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=&quot;\/:*?&lt;&gt;|&quot;
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FILO\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_. &quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ]

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMELNK]

[ModelOptions\Cld\ClssNamingOptions\FRMELNK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMELNK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DefaultClass]

[ModelOptions\Cld\ClssNamingOptions\DefaultClass\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DefaultClass\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Generate]

[ModelOptions\Generate\Cdm]
CheckModel=Yes
SaveLinks=Yes
NameToCode=No
Notation=2

[ModelOptions\Generate\Pdm]
CheckModel=Yes
SaveLinks=Yes
ORMapping=No
NameToCode=No
BuildTrgr=No
TablePrefix=
RefrUpdRule=RESTRICT
RefrDelRule=RESTRICT
IndxPKName=%TABLE%_PK
IndxAKName=%TABLE%_AK
IndxFKName=%REFR%_FK
IndxThreshold=
ColnFKName=%.3:PARENT%_%COLUMN%
ColnFKNameUse=No

[ModelOptions\Generate\Xsm]
CheckModel=Yes
SaveLinks=Yes
ORMapping=No
NameToCode=No</a:ModelOptionsText>
<c:ObjectLanguage>
<o:Shortcut Id="o3">
<a:ObjectID>C875CAEC-C53D-4AF3-AD7A-282F31A633D6</a:ObjectID>
<a:Name>Analyse</a:Name>
<a:Code>Analysis</a:Code>
<a:CreationDate>1728567010</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567010</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:TargetStereotype/>
<a:TargetID>87317290-AF03-469F-BC1E-99593F18A4AB</a:TargetID>
<a:TargetClassID>1811206C-1A4B-11D1-83D9-444553540000</a:TargetClassID>
</o:Shortcut>
</c:ObjectLanguage>
<c:ClassDiagrams>
<o:ClassDiagram Id="o4">
<a:ObjectID>8D478C21-8B0E-46D4-A2B8-EA69C132B950</a:ObjectID>
<a:Name>DiagrammeClasses_1</a:Name>
<a:Code>DiagrammeClasses_1</a:Code>
<a:CreationDate>1728567010</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569975</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DisplayPreferences>[DisplayPreferences]

[DisplayPreferences\CLD]

[DisplayPreferences\General]
Adjust to text=Yes
Snap Grid=No
Constrain Labels=Yes
Display Grid=No
Show Page Delimiter=Yes
Grid size=0
Graphic unit=2
Window color=255, 255, 255
Background image=
Background mode=8
Watermark image=
Watermark mode=8
Show watermark on screen=No
Gradient mode=0
Gradient end color=255, 255, 255
Show Swimlane=No
SwimlaneVert=Yes
TreeVert=No
CompDark=0

[DisplayPreferences\Object]
Mode=2
Trunc Length=40
Word Length=40
Word Text=!&quot;&quot;#$%&amp;&#39;()*+,-./:;&lt;=&gt;?@[\]^_`{|}~
Shortcut IntIcon=Yes
Shortcut IntLoct=Yes
Shortcut IntFullPath=No
Shortcut IntLastPackage=Yes
Shortcut ExtIcon=Yes
Shortcut ExtLoct=No
Shortcut ExtFullPath=No
Shortcut ExtLastPackage=Yes
Shortcut ExtIncludeModl=Yes
EObjShowStrn=Yes
ExtendedObject.Comment=No
ExtendedObject.IconPicture=No
ExtendedObject_SymbolLayout=&lt;Form&gt;[CRLF] &lt;StandardAttribute Name=&quot;Stéréotype&quot; Attribute=&quot;Stereotype&quot; Prefix=&quot;&amp;lt;&amp;lt;&quot; Suffix=&quot;&amp;gt;&amp;gt;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;StandardAttribute Name=&quot;Nom de l&amp;#39;objet&quot; Attribute=&quot;DisplayName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;Yes&quot; /&gt;[CRLF] &lt;Separator Name=&quot;Séparateur&quot; /&gt;[CRLF] &lt;StandardAttribute Name=&quot;Commentaire&quot; Attribute=&quot;Comment&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;LEFT&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;StandardAttribute Name=&quot;Icône&quot; Attribute=&quot;IconPicture&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;Yes&quot; /&gt;[CRLF]&lt;/Form&gt;
ELnkShowStrn=Yes
ELnkShowName=Yes
ExtendedLink_SymbolLayout=&lt;Form&gt;[CRLF] &lt;Form Name=&quot;Centre&quot; &gt;[CRLF]  &lt;StandardAttribute Name=&quot;Stéréotype&quot; Attribute=&quot;Stereotype&quot; Prefix=&quot;&amp;lt;&amp;lt;&quot; Suffix=&quot;&amp;gt;&amp;gt;&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF]  &lt;StandardAttribute Name=&quot;Nom&quot; Attribute=&quot;DisplayName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;/Form&gt;[CRLF] &lt;Form Name=&quot;Source&quot; &gt;[CRLF] &lt;/Form&gt;[CRLF] &lt;Form Name=&quot;Destination&quot; &gt;[CRLF] &lt;/Form&gt;[CRLF]&lt;/Form&gt;
FileObject.Stereotype=No
FileObject.DisplayName=Yes
FileObject.LocationOrName=No
FileObject.IconPicture=No
FileObject.IconMode=Yes
FileObject_SymbolLayout=&lt;Form&gt;[CRLF] &lt;StandardAttribute Name=&quot;Stéréotype&quot; Attribute=&quot;Stereotype&quot; Prefix=&quot;&amp;lt;&amp;lt;&quot; Suffix=&quot;&amp;gt;&amp;gt;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;ExclusiveChoice Name=&quot;Choix exclusif&quot; Mandatory=&quot;Yes&quot; Display=&quot;HorizontalRadios&quot; &gt;[CRLF]  &lt;StandardAttribute Name=&quot;Nom&quot; Attribute=&quot;DisplayName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF]  &lt;StandardAttribute Name=&quot;Emplacement&quot; Attribute=&quot;LocationOrName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;/ExclusiveChoice&gt;[CRLF] &lt;StandardAttribute Name=&quot;Icône&quot; Attribute=&quot;IconPicture&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;Yes&quot; /&gt;[CRLF]&lt;/Form&gt;
PckgShowStrn=Yes
Package.Comment=No
Package.IconPicture=No
Package_SymbolLayout=
Display Model Version=Yes
Class.IconPicture=No
Class_SymbolLayout=
Interface.IconPicture=No
Interface_SymbolLayout=
Port.IconPicture=No
Port_SymbolLayout=
ClssShowSttr=Yes
Class.Comment=No
ClssShowCntr=Yes
ClssShowAttr=Yes
ClssAttrTrun=No
ClssAttrMax=3
ClssShowMthd=Yes
ClssMthdTrun=No
ClssMthdMax=3
ClssShowInnr=Yes
IntfShowSttr=Yes
Interface.Comment=No
IntfShowAttr=Yes
IntfAttrTrun=No
IntfAttrMax=3
IntfShowMthd=Yes
IntfMthdTrun=No
IntfMthdMax=3
IntfShowCntr=Yes
IntfShowInnr=Yes
PortShowName=Yes
PortShowType=No
PortShowMult=No
AttrShowVisi=Yes
AttrVisiFmt=1
AttrShowStrn=Yes
AttrShowDttp=Yes
AttrShowDomn=No
AttrShowInit=Yes
MthdShowVisi=Yes
MthdVisiFmt=1
MthdShowStrn=Yes
MthdShowRttp=Yes
MthdShowParm=Yes
AsscShowName=No
AsscShowCntr=Yes
AsscShowRole=Yes
AsscShowOrdr=Yes
AsscShowMult=Yes
AsscMultStr=Yes
AsscShowStrn=No
GnrlShowName=No
GnrlShowStrn=Yes
GnrlShowCntr=Yes
RlzsShowName=No
RlzsShowStrn=Yes
RlzsShowCntr=Yes
DepdShowName=No
DepdShowStrn=Yes
DepdShowCntr=Yes
RqlkShowName=No
RqlkShowStrn=Yes
RqlkShowCntr=Yes

[DisplayPreferences\Symbol]

[DisplayPreferences\Symbol\FRMEOBJ]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=6000
Height=2000
Brush color=255 255 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=64
Brush gradient color=192 192 192
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 255 128 128
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\FRMELNK]
CENTERFont=Arial,8,N
CENTERFont color=0, 0, 0
Line style=1
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\FILO]
OBJSTRNFont=Arial,8,N
OBJSTRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LCNMFont=Arial,8,N
LCNMFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 0 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDPCKG]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=255 255 192
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 178 178 178
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDCLASS]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
CNTRFont=Arial,8,N
CNTRFont color=0, 0, 0
AttributesFont=Arial,8,N
AttributesFont color=0, 0, 0
ClassPrimaryAttributeFont=Arial,8,U
ClassPrimaryAttributeFont color=0, 0, 0
OperationsFont=Arial,8,N
OperationsFont color=0, 0, 0
InnerClassifiersFont=Arial,8,N
InnerClassifiersFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=174 228 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDINTF]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
CNTRFont=Arial,8,N
CNTRFont color=0, 0, 0
AttributesFont=Arial,8,N
AttributesFont color=0, 0, 0
OperationsFont=Arial,8,N
OperationsFont color=0, 0, 0
InnerClassifiersFont=Arial,8,N
InnerClassifiersFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=208 208 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\OOMPORT]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=800
Height=800
Brush color=174 228 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDASSC]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
MULAFont=Arial,8,N
MULAFont color=0, 0, 0
Line style=1
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\INNERLINK]
Line style=1
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDACLK]
Line style=1
Pen=2 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\GNRLLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\RLZSLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=3 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\RQLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\DEPDLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=2 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\USRDEPD]
OBJXSTRFont=Arial,8,N
OBJXSTRFont color=0, 0, 0
Line style=1
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=2 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\Free Symbol]
Free TextFont=Arial,8,N
Free TextFont color=0, 0, 0
Line style=0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 0 255
Shadow color=192 192 192
Shadow=0</a:DisplayPreferences>
<a:PaperSize>(8268, 11693)</a:PaperSize>
<a:PageMargins>((315,354), (433,354))</a:PageMargins>
<a:PageOrientation>1</a:PageOrientation>
<a:PaperSource>15</a:PaperSource>
<c:Symbols>
<o:ClassSymbol Id="o5">
<a:CreationDate>1728567020</a:CreationDate>
<a:ModificationDate>1728567020</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-12552,13466), (-1998,22156))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o6"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o7">
<a:CreationDate>1728567535</a:CreationDate>
<a:ModificationDate>1728567745</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-23670,5), (-14428,6747))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o8"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o9">
<a:CreationDate>1728567748</a:CreationDate>
<a:ModificationDate>1728567748</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-6956,-13420), (5608,-4730))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o10"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o11">
<a:CreationDate>1728568342</a:CreationDate>
<a:ModificationDate>1728568342</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((7228,-1010), (16470,4758))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o12"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o13">
<a:CreationDate>1728568474</a:CreationDate>
<a:ModificationDate>1728568474</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-20681,-11058), (-10667,-3342))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o14"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o15">
<a:CreationDate>1728568696</a:CreationDate>
<a:ModificationDate>1728568696</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((4875,11889), (9674,15710))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o16"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o17">
<a:CreationDate>1728569626</a:CreationDate>
<a:ModificationDate>1728569626</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-23599,-21749), (-14049,-16955))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o18"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o19">
<a:CreationDate>1728569975</a:CreationDate>
<a:ModificationDate>1728569975</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-8024,3189), (-3225,7010))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o20"/>
</c:Object>
</o:ClassSymbol>
</c:Symbols>
</o:ClassDiagram>
</c:ClassDiagrams>
<c:DefaultDiagram>
<o:ClassDiagram Ref="o4"/>
</c:DefaultDiagram>
<c:Classes>
<o:Class Id="o6">
<a:ObjectID>2E8AD659-7684-47F1-8F5E-C7E034BBD8E7</a:ObjectID>
<a:Name>Utilisateur</a:Name>
<a:Code>Utilisateur</a:Code>
<a:CreationDate>1728567020</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567504</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o21">
<a:ObjectID>03A5DB8D-9EB0-4887-9E17-A6F0696B2F04</a:ObjectID>
<a:Name>ID_utilisateur</a:Name>
<a:Code>ID_utilisateur</a:Code>
<a:CreationDate>1728567031</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567467</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o22">
<a:ObjectID>D164BF35-7499-4B09-B147-D4399D4D28D9</a:ObjectID>
<a:Name>Nom</a:Name>
<a:Code>Nom</a:Code>
<a:CreationDate>1728567148</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567418</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o23">
<a:ObjectID>4ACB76B2-7BD1-49B1-8064-E384C4EDAF5C</a:ObjectID>
<a:Name>Prénom</a:Name>
<a:Code>Prenom</a:Code>
<a:CreationDate>1728567148</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567418</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o24">
<a:ObjectID>910889D6-9CA4-4B99-A0D0-F25FE6AB9601</a:ObjectID>
<a:Name>Mail</a:Name>
<a:Code>Mail</a:Code>
<a:CreationDate>1728567148</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567418</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o25">
<a:ObjectID>0A7E0174-B5D0-4F1D-A4A1-D46651FE9A4C</a:ObjectID>
<a:Name>Password</a:Name>
<a:Code>Password</a:Code>
<a:CreationDate>1728567148</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567418</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o26">
<a:ObjectID>D5400B42-4CC1-4971-B543-7236389BDDAA</a:ObjectID>
<a:Name>estVendeur</a:Name>
<a:Code>estVendeur</a:Code>
<a:CreationDate>1728567464</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567504</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>boolean</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o27">
<a:ObjectID>BF94254E-BB56-4DE7-AFF8-D10DB711EA31</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1728567449</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567467</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o21"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o28">
<a:ObjectID>291C8A6D-D9C9-455A-A3D3-AE828E9AB95B</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1728567464</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567467</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o21"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o28"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o8">
<a:ObjectID>EB54CAFD-5AD4-4611-B921-D8BC82FF6185</a:ObjectID>
<a:Name>Achat</a:Name>
<a:Code>Achat</a:Code>
<a:CreationDate>1728567535</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567741</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o29">
<a:ObjectID>FED88236-26FA-46DF-A162-DBC72D97AFE5</a:ObjectID>
<a:Name>ID_achat</a:Name>
<a:Code>ID_achat</a:Code>
<a:CreationDate>1728567539</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567585</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o30">
<a:ObjectID>98131FE9-6983-4245-94B0-47FA7DAA22B4</a:ObjectID>
<a:Name>ID_utilisateur</a:Name>
<a:Code>ID_utilisateur</a:Code>
<a:CreationDate>1728567539</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567741</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o31">
<a:ObjectID>B81971F7-D5C7-4393-B0C1-8FF076C1902D</a:ObjectID>
<a:Name>Date</a:Name>
<a:Code>Date</a:Code>
<a:CreationDate>1728567580</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567741</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o32">
<a:ObjectID>533F0A8E-034D-48D3-A41D-34146E8011E9</a:ObjectID>
<a:Name>Attribut_4</a:Name>
<a:Code>Attribut_4</a:Code>
<a:CreationDate>1728567580</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567741</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o33">
<a:ObjectID>F9DDF3CF-822F-416C-9D9D-467AED9ED911</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1728567580</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567585</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o29"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o33"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o10">
<a:ObjectID>DD9882A9-B1F2-4761-81A3-A3CA912776DD</a:ObjectID>
<a:Name>Produit</a:Name>
<a:Code>Produit</a:Code>
<a:CreationDate>1728567748</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728570027</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o34">
<a:ObjectID>0945A4F1-DC29-4036-BAB6-E0EA665574FB</a:ObjectID>
<a:Name>ID_Produit</a:Name>
<a:Code>ID_Produit</a:Code>
<a:CreationDate>1728567751</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568296</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o35">
<a:ObjectID>3FE43FD7-12BC-45CC-9DC4-BF98BEB2FC8C</a:ObjectID>
<a:Name>Nom</a:Name>
<a:Code>Nom</a:Code>
<a:CreationDate>1728567751</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568268</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o36">
<a:ObjectID>32088A5A-0BB9-4916-939F-BDDF6D319D16</a:ObjectID>
<a:Name>Description</a:Name>
<a:Code>Description</a:Code>
<a:CreationDate>1728567751</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568268</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o37">
<a:ObjectID>C249B139-3AFF-41E2-8C41-7C80B692B75B</a:ObjectID>
<a:Name>Prix</a:Name>
<a:Code>Prix</a:Code>
<a:CreationDate>1728567751</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568268</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o38">
<a:ObjectID>19C5C0F3-3160-479E-8069-713454D1DE32</a:ObjectID>
<a:Name>ID_Image</a:Name>
<a:Code>ID_Image</a:Code>
<a:CreationDate>1728567751</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568268</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o39">
<a:ObjectID>0450AE3A-3F11-48DB-B74E-D17226327E5B</a:ObjectID>
<a:Name>AppartientVendeur</a:Name>
<a:Code>AppartientVendeur</a:Code>
<a:CreationDate>1728570006</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728570027</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>boolean</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o40">
<a:ObjectID>D0E34805-CC43-4A36-8E1F-9CE0B5F59F87</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1728568276</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568296</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o34"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o41">
<a:ObjectID>5CD0DD4B-170A-455C-85F6-850558505086</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1728568293</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568296</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o34"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o41"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o12">
<a:ObjectID>567F1AD1-8C15-4BEB-ADDA-6C7EF919E4A9</a:ObjectID>
<a:Name>Promotion</a:Name>
<a:Code>Promotion</a:Code>
<a:CreationDate>1728568342</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568412</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o42">
<a:ObjectID>1AA69CA6-DAE1-4358-A8A4-516C45F73FD0</a:ObjectID>
<a:Name>ID_promo</a:Name>
<a:Code>ID_promo</a:Code>
<a:CreationDate>1728568346</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568412</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o43">
<a:ObjectID>883F1570-4FD6-4F43-800D-9B1CF84DC45E</a:ObjectID>
<a:Name>Code</a:Name>
<a:Code>Code</a:Code>
<a:CreationDate>1728568346</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568400</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o44">
<a:ObjectID>F208404C-9670-401C-9569-673612D21AE4</a:ObjectID>
<a:Name>Coefficient</a:Name>
<a:Code>Coefficient</a:Code>
<a:CreationDate>1728568346</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568435</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>double</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o45">
<a:ObjectID>A8B61F49-FCFF-4FF4-9A1E-0BD0821F89FD</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1728568408</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568412</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o42"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o45"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o14">
<a:ObjectID>DB0935BB-948B-4599-8F76-B6B6AB5E278E</a:ObjectID>
<a:Name>Avis</a:Name>
<a:Code>Avis</a:Code>
<a:CreationDate>1728568474</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568642</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o46">
<a:ObjectID>97DFBD19-3258-41B8-B804-FEB60576F2AF</a:ObjectID>
<a:Name>ID_avis</a:Name>
<a:Code>ID_avis</a:Code>
<a:CreationDate>1728568479</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568642</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o47">
<a:ObjectID>1310E6C7-1568-4272-8E90-C4AD14BEE88D</a:ObjectID>
<a:Name>Contenu</a:Name>
<a:Code>Contenu</a:Code>
<a:CreationDate>1728568479</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568624</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o48">
<a:ObjectID>45D89155-0C4C-41D6-8B00-990B669A8F5D</a:ObjectID>
<a:Name>ID_utilisateur</a:Name>
<a:Code>ID_utilisateur</a:Code>
<a:CreationDate>1728568479</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568624</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o49">
<a:ObjectID>66BBFBEE-CF57-4395-90A6-6F9DB31C5EF1</a:ObjectID>
<a:Name>ID_produit</a:Name>
<a:Code>ID_produit</a:Code>
<a:CreationDate>1728568479</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568624</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o50">
<a:ObjectID>2348388F-F2E0-4310-A7F0-C508FF35CD52</a:ObjectID>
<a:Name>Date_création</a:Name>
<a:Code>Date_creation</a:Code>
<a:CreationDate>1728568479</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568624</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o51">
<a:ObjectID>2BBC4D61-9798-4507-9B6A-91B6C0E27834</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1728568624</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568642</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o46"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o52">
<a:ObjectID>F8A179B8-ED27-48C3-8425-887A2B66CA80</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1728568639</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568642</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o46"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o52"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o16">
<a:ObjectID>CF6DCB82-BA44-47F9-B657-01C989E1B545</a:ObjectID>
<a:Name>Image</a:Name>
<a:Code>Image</a:Code>
<a:CreationDate>1728568696</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728568707</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
</o:Class>
<o:Class Id="o18">
<a:ObjectID>C822E688-FF34-47DA-8E2B-BDEB63F32ACF</a:ObjectID>
<a:Name>Catégorie</a:Name>
<a:Code>Categorie</a:Code>
<a:CreationDate>1728569626</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569858</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o53">
<a:ObjectID>1F48E63D-7112-4EE9-AD19-9B99DCCD4FB0</a:ObjectID>
<a:Name>ID_catégorie</a:Name>
<a:Code>ID_categorie</a:Code>
<a:CreationDate>1728569796</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569858</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o54">
<a:ObjectID>D4342F72-9F48-40D3-AE9D-4DC77A922AC1</a:ObjectID>
<a:Name>Nom</a:Name>
<a:Code>Nom</a:Code>
<a:CreationDate>1728569796</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569830</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o55">
<a:ObjectID>41E59194-8337-4723-AC2E-CEF0D141BEA9</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1728569833</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569858</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o53"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o56">
<a:ObjectID>2D4EDC42-115D-43C9-A8BC-83E7EFD99CCC</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1728569855</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569858</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o53"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o56"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o20">
<a:ObjectID>813B2872-CF24-4345-A720-5ACB4A6745CF</a:ObjectID>
<a:Name>Panier</a:Name>
<a:Code>Panier</a:Code>
<a:CreationDate>1728569975</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728569982</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
</o:Class>
</c:Classes>
<c:TargetModels>
<o:TargetModel Id="o57">
<a:ObjectID>4A2C56A3-495C-4E17-A142-B7E6EA4F4E5B</a:ObjectID>
<a:Name>Analyse</a:Name>
<a:Code>Analysis</a:Code>
<a:CreationDate>1728567010</a:CreationDate>
<a:Creator>saber</a:Creator>
<a:ModificationDate>1728567010</a:ModificationDate>
<a:Modifier>saber</a:Modifier>
<a:TargetModelURL>file:///%_OBJLANG%/analysis.xol</a:TargetModelURL>
<a:TargetModelID>87317290-AF03-469F-BC1E-99593F18A4AB</a:TargetModelID>
<a:TargetModelClassID>1811206C-1A4B-11D1-83D9-444553540000</a:TargetModelClassID>
<c:SessionShortcuts>
<o:Shortcut Ref="o3"/>
</c:SessionShortcuts>
</o:TargetModel>
</c:TargetModels>
</o:Model>
</c:Children>
</o:RootObject>

</Model>