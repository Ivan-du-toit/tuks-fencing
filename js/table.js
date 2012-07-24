function TableCtrl($scope) {
    $scope.categories = [
        {'weapon':'Epee', 'age':'U13', 'gender':'Female', 'start_time':'', 'id':0}
    ];
    $scope.weapons = ['Epee', 'Foil', 'Saber'];
    $scope.ages = ['U13', 'U15', 'U17', 'U20', 'Senior', 'Veterans', 'Open'];
    $scope.genders = ['Female', 'Male'];

    $scope.addCategory = function() {
        if ($scope.categories.length != 0)
            var newId = $scope.categories[$scope.categories.length-1].id+1;
        else
            var newId = 0;
        $scope.categories.push({'weapon':'Epee', 'age':'U13', 'gender':'Female', 'start_time':'', 'id':newId});
    };

    $scope.removeCategory = function($id) {
        var oldCategories = $scope.categories;
        $scope.categories = [];
        angular.forEach(oldCategories, function(category) {
            //alert($id);
            if (category.id != $id) $scope.categories.push(category);
        });
    };
}