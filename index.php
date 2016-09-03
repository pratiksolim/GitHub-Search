<!DOCTYPE html>
<html>

<head>
    <title>GitHub search by Pratik Solim</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container outerdiv" ng-app="myApp" ng-controller="GitController">

        <noscript>
            <div class="nojs">Javascript is either disabled or not supported in your browser. Please enable it or use a Javascript enabled browser.</div>
        </noscript>

        <header>
            <div class="brand_name">
                <i class="fa fa-github"></i>
                <h3>TopGit - finding the best github projects!</h3>
            </div>
        </header>

        <section>
            <form class="row filters">
                <div class="col-md-6 col-sm-4 col-xs-3 search_box">
                    <input type="text" ng-model="search" ng-model-options="{ debounce: 800 }" placeholder="Search for a language">
                </div>
                <div class="col-md-4 col-sm-5 col-xs-5 sort_star">
                    <span><i class="fa fa-star"></i>  Minimum Stars</span>
                    <input type="text" ng-model="stars" ng-model-options="{ debounce: 800 }" placeholder="Star Count">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4 rate_limit">
                    <span><i class="glyphicon glyphicon-stats"></i> Rate limit {{ details.X-RateLimit-Remaining }} out of {{ details.X-RateLimit-Limit }}</span>
                </div>
            </form>
            <div class="result_box" ng-if="details.total_count === 0">
                <div class="result_count">No result found</div>
            </div>
            <div class="result_box" ng-if="details.total_count > 0">
                <div class="result_count">About {{ details.total_count }} results ( Page {{ page }} of {{ Math.round(details.total_count/30) }} )</div>
                <div class="row search_results" ng-repeat="x in details.items">
                  <div class="col-md-9 col-xs-7 repo_details">
                    <a class="repo_name" href="{{ x.html_url }}" target="_blank">{{ x.full_name }}</a>
                    <div class="repo_describe">{{ x.description }}</div>
                  </div>
                  <div class="col-md-2 col-xs-3 repo_lang">
                    <span>Language: {{ x.language }}</span>
                  </div>
                  <div class="col-md-1 col-xs-2 repo_lang">
                    <span><i class="fa fa-code-fork"></i> {{ x.forks_count }}</span>
                  </div>
                </div>
            </div>
            <div ng-if="details.total_count > 0" class="pagination_div">
                <ul class="pagination">
                  <li ng-model="page" ng-model-options="{ debounce: 800 }" ng-if="page>1" ng-click="removePage()" class="nextprev">< Previous</li>
                  <li ng-model="page" ng-model-options="{ debounce: 800 }" ng-click="keepPage()" class="active_page">{{ page }}</li>
                  <li ng-model="page" ng-model-options="{ debounce: 800 }" ng-click="addPage()" class="nextprev">Next ></li>
                </ul>
            </div>
        </section>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/fc5a0990d1.js"></script>
    <script src="main.js"></script>
</body>

</html>
