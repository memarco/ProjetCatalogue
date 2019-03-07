   <script language="JavaScript" type="text/javascript" src="../cbrte/html2xhtml.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="../cbrte/richtext.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">


<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->

        <h2>Cross-Browser Rich Text Editor (RTE) Demo</h2>
        <p>For more information, visit the <a href="http://www.kevinroth.com/rte/">Cross-Browser Rich Text Editor (RTE) home page</a>.</p>

        <!-- START Demo Code -->
        <form name="RTEDemo" action="create" method="post" onsubmit="return submitForm();">
        <script language="JavaScript" type="text/javascript">
        <!--
        function submitForm() {
        	//make sure hidden and iframe values are in sync for all rtes before submitting form
        	updateRTEs();

        	return true;
        }

        //Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
        initRTE("../cbrte/images/", "../cbrte/", "", true);
        //-->
        </script>
        <noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

        <script language="JavaScript" type="text/javascript">
        <!--
        //build new richTextEditor
        var rte1 = new richTextEditor('rte1');
        <?php
        //format content for preloading
        if (!(isset($_POST["rte1"]))) {
        	$content = "here's the " . chr(13) . "\"preloaded <b>content</b>\"";
        	$content = rteSafe($content);
        } else {
        	//retrieve posted value
        	$content = rteSafe($_POST["rte1"]);
        }
        ?>
        rte1.html = '<?=$content;?>';
        //rte1.toggleSrc = false;
        rte1.build();
        //-->
        </script>
        <p><input type="submit" name="submit" value="Submit" /></p>
        </form>
        <?php
        function rteSafe($strText) {
        	//returns safe code for preloading in the RTE
        	$tmpString = $strText;

        	//convert all types of single quotes
        	$tmpString = str_replace(chr(145), chr(39), $tmpString);
        	$tmpString = str_replace(chr(146), chr(39), $tmpString);
        	$tmpString = str_replace("'", "&#39;", $tmpString);

        	//convert all types of double quotes
        	$tmpString = str_replace(chr(147), chr(34), $tmpString);
        	$tmpString = str_replace(chr(148), chr(34), $tmpString);
        //	$tmpString = str_replace("\"", "\"", $tmpString);

        	//replace carriage returns & line feeds
        	$tmpString = str_replace(chr(10), " ", $tmpString);
        	$tmpString = str_replace(chr(13), " ", $tmpString);

        	return $tmpString;
        }
        ?>
        <!-- END Demo Code -->

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
                        </div>
                        <div class="col-sm-offset-2 col-sm-3">
                            <a class="btn btn-danger btn-block" href="<?php echo site_url('page/'); ?>" role="button">Annuler</a>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
