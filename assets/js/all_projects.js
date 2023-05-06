function searchProject()
{
    const search = document.getElementById("project-search").value;
    console.log(search);
    var projects = document.getElementsByClassName("project-card");
    console.log(projects);

    for (var i = 0, len = projects.length; i < len; ++i) {

        if(projects[i].innerHTML.indexOf(search) == -1) {
            projects[i].style.display = "none";
        }else{
            projects[i].style.display = "block";
        }

    }
}
