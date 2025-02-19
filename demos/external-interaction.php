<?php  
error_reporting(E_ALL);
ini_set("display_errors", true);
$caseid=$_GET['caseid'];
$sourceroot=$_GET['sourceroot'];
 
{
    shell_exec("sh clustertrial.sh $caseid");
    
    if($conn){
       $sq=pg_query("select case_cluster from case_ where id=$caseid");
       $cluster=pg_fetch_result($sq, 0, 'case_cluster');
    }
    $json=$cluster;
    $fp=fopen('assets/data/test.js','w');
    fputs($fp, $json);
    fclose($fp);
}

{
    shell_exec("sh clustertrial.sh $caseid");
   
    if($conn){
       $sq=pg_query("select case_cluster from case_ where id=$caseid");
       $cluster=pg_fetch_result($sq, 0, 'case_cluster');
    }
    $json=$cluster;
    $fp=fopen('assets/data/test.js','w');
    fputs($fp, $json);
    fclose($fp);
}

{
       // shell_exec("sh clustertrial.sh $caseid");
         
            if($conn){
                       $sq=pg_query("select case_cluster from case_ where id=$caseid");
                              $cluster=pg_fetch_result($sq, 0, 'case_cluster');
                           }
                $json=$cluster;
                $fp=fopen('assets/data/test.js','w');
                    fputs($fp, $json);
                        fclose($fp);
}

else
{
    //$shell = shell_exec("./clustercase.sh $caseid");
   // echo shell_exec("sh clustercase.sh $caseid");
    //print_r($shell);
    //exit;
  
   // print_r($conn);
    if($conn){
        $sq=pg_query("select case_cluster from case_ where id=$caseid");
  //      print_r($sq);
    //    exit;
        $cluster=pg_fetch_result($sq, 0, 'case_cluster');
    //    print_r($cluster);
        //exit;
    }
    $json=$cluster;
    //echo $json;
    $fp=fopen('assets/data/test.js','w');
    fputs($fp, $json);
    fclose($fp);
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>FoamTree with externally-triggered interaction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta property="og:image" content="http://get.carrotsearch.com/foamtree/latest/demos/assets/img/main-thumbnail.jpg"/>

    <meta charset="utf-8" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/common.css" rel="stylesheet" />

       <style>
      .twitter-typeahead {
        display: block !important;
      }
      .tt-hint {
        display: block;
        padding: 6px 12px;
        line-height: 1.428571429;
        color: #999;
        vertical-align: middle;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
              transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
      }
      .tt-dropdown-menu {
        width: 100%;
        min-width: 160px;
        margin-top: 2px;
        padding: 5px 0;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
              box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        background-clip: padding-box;
        max-height: 350px;
        overflow-y: auto;
      }
      .tt-suggestion {
        display: block;
        padding: 3px 20px;
      }
      .tt-suggestion > div > small {
        font-size: 100%;
        color: #888;
        margin-left: 6px;
        padding-left: 6px;
        border-left: 1px solid #eee;
      }
      .tt-suggestion:hover {
        background-color: #f5f5f5;
      }
      #direct > div {
        margin-bottom: 10px;
      }
      #direct > div > a {
        padding-right: 5px;
        margin-right: 5px;
        border-right: 1px solid #ddd;
      }
      #direct > div > a:last-of-type {
        border: none;
      }
      #datasets > a {
        display: block;
      }
      .dl-horizontal {
        margin-top: 0;
      }
      .dl-horizontal > dd {
        margin-left: 155px;
        font-weight: bold;
      }
      .dl-horizontal > dt {
        width: 150px;
        text-align: left;
        font-weight: normal;
      }
      section {
        margin-top: 25px;
      }
    </style>

  </head>

  <body>
    <div id="container"><div id="visualization"></div></div>
 <script src="assets/js/jquery-2.0.3.min.js"></script>
     <script src="../carrotsearch.foamtree.js"></script>

    <!-- Include the tree model utilities -->
    <script src="../carrotsearch.foamtree.util.treemodel.js"></script>
    <script src="assets/js/hammer.min.js"></script>
   
    <script src="../carrotsearch.foamtree.js"></script>
    <script src="assets/js/carrotsearch.jsonp.js"></script>
      <script src="assets/js/carrotsearch.template.js"></script>
          <script src="assets/js/typeahead.js"></script>

    <script src="assets/js/hammer.min.js"></script>
    <script>
      window.addEventListener("load", function () {
        // Get the element FoamTree will be embedded in
        var element = document.getElementById("visualization");
       

   
        // Initialize FoamTree
         var foamtree = new CarrotSearchFoamTree({
          id: "visualization",
          pixelRatio: window.devicePixelRatio || 1,
          onKeyUp: function(event) {
            console.log(event.keyCode)
            if (event.keyCode === 27) {
              event.preventDefault();
              foamtree.set("zoomMouseWheelEasing", "squareInOut");
              this.zoom(this.get("dataObject")).then(this.reset);
              foamtree.set("zoomMouseWheelDuration", CarrotSearchFoamTree.defaults.zoomMouseWheelDuration);
              foamtree.set("zoomMouseWheelEasing", CarrotSearchFoamTree.defaults.zoomMouseWheelEasing);
             
            }
          },
         
        });


        // Bind Hammer to the visualization element
        var hammer = Hammer(element);

        // For each Hammer.js event, make the appropriate foamtree.trigger() call.
        hammer.on("tap",            createFoamTreeEventTrigger("click"));
        hammer.on("doubletap",      createFoamTreeEventTrigger("doubleclick"));
        hammer.on("hold",           createFoamTreeEventTrigger("hold"));
        hammer.on("touch",          createFoamTreeEventTrigger("mousedown"));
        hammer.on("dragstart",      createFoamTreeEventTrigger("dragstart"));
        hammer.on("drag",           createFoamTreeEventTrigger("drag"));
        hammer.on("dragend",        createFoamTreeEventTrigger("dragend"));
        hammer.on("transformstart", createFoamTreeEventTrigger("transformstart"));
        hammer.on("transform",      createFoamTreeEventTrigger("transform"));
        hammer.on("transformend",   createFoamTreeEventTrigger("transformend"));
        // hammer.on("onKeyUp",   createFoamTreeEventTrigger("onKeyUp"))
        // Resize FoamTree on orientation change
        window.addEventListener("orientationchange", foamtree.resize);


        // Resize on window size changes
        window.addEventListener("resize", (function() {
          var timeout;
          return function() {
            window.clearTimeout(timeout);
            timeout = window.setTimeout(foamtree.resize, 300);
          }
        })());
      
        // function convert(clusters) {
        //       return clusters.map(function(cluster) {
        //         return {
        //           id:     cluster.id,
        //           label:  cluster.documents.fields.title,
        //           weight: cluster.attributes && cluster.attributes["other-topics"] ? 0 : cluster.size,
        //           groups: cluster.clusters ? convert(cluster.clusters) : [],
        //         }
        //       });
        //     };


        function convert(clusters) {
              return clusters.map(function(cluster) {
                return {
                  id:     cluster.id,
                  label:  cluster.phrases.join(", "),
                  weight: cluster.attributes && cluster.attributes["other-topics"] ? 0 : cluster.size,
                  groups: cluster.clusters ? convert(cluster.clusters) : [],
                }
              });
            };
        // function convert(documents) {
        //       return  documents.map(function(doc) {
        //         return {
        //           id:     doc.id,
        //           label:  doc.phrases.join(", "),
        //           weight: doc.attributes &&doc.attributes["other-topics"] ? 0 : cluster.size,
        //           groups: cluster.clusters ? convert(cluster.clusters) : [],
        //         }
        //       });
        //     };
    // Clear the previous model.
          // foamtree.set("dataObject", null);

                  // var dataObject = {
                  //   groups: _.reduce(carrot2Json.clusters,
                  //     function reducer(arr, cluster) 
                  //     {
                  //       arr.push({
                  //         id: cluster.id,
                  //         weight: cluster.attributes && cluster.attributes["other-topics"] ? 0 : cluster.size,
                  //         label: cluster.phrases[0],
                  //         groups: _.reduce(cluster.clusters || [], reducer, []),
                  //         cluster: cluster
                  //       });
                  //       return arr;
                  //     }, []);
                  //  };
    // Load Carrot2 JSON clusters.
              $.ajax({
                url: "assets/data/test.js",
                dataType: "JSON",
                success: function(data) {
                  foamtree.set({
                    dataObject: {
                      groups : convert(data.clusters)
                    }
                  });
                }
              });
              // console.log(dataObject);


        // Load some example data set
        // JSONP.load(
        //   foamtree.set("../demos/assets/data/carrot2/madpilot.js", dataObject))

        // Returns a function that calls foamtree.trigger() with
        // the requested event type and event details created based
        // on the Hammer.js event object.
        function createFoamTreeEventTrigger(type) {
          return function (hammerEvent) {
            var gesture = hammerEvent["gesture"];
            var center = gesture["center"];

            // Heads up! Hammer calls the properties pageX/Y, but they actually contain clientX/Y.
            var eventDetails = pageToElementRelative(element, center.pageX, center.pageY);
            eventDetails.scale = gesture["scale"];
            eventDetails.secondary = gesture.touches.length > 1;
            eventDetails.touches = gesture.touches.length;
            gesture.preventDefault();
            foamtree.trigger(type, eventDetails);
          };

          // FoamTree requires element-relative coordinates.
          // Here is a simple conversion from page-relative ones.
          function pageToElementRelative(element, clientX, clientY) {
            var target = {};
            var rect = element.getBoundingClientRect();
            target.x = clientX - rect["left"];
            target.y = clientY - rect["top"];
            return target;
          }
        }
      });
 
    </script>
  </body>
</html>
