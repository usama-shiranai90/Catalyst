/*Script would load when the whole page it is associated to is loaded along with its contents*/
window.onload = function () {


    function removeFocusFromSelectedNavItems(selectedItemID) {

        //For removing focus from navigation items
        let navigators = document.querySelectorAll(".navigationItemSelected")
        navigators.forEach((item) => {
            if (item.id != selectedItemID) {
                item.classList.remove("navigationItemSelected")

                //For removing focus from SVGs in navigation items
                let bluedNavigators = document.querySelectorAll("#" + item.id + " .turnItBlueForever")
                bluedNavigators.forEach((item) => {
                    item.classList.remove("turnItBlueForever")
                    item.classList.add("turnItWhite")
                })
            }
        })


        //For removing focus from menu items in the dropdown navigation items
        let menuItems = document.querySelectorAll(".menuItem")
        menuItems.forEach((item) => {
            item.classList.remove("menuItemSelected")
        })
    }

    /*jQuery*/
    $(document).ready(function () {
        $(".navigationItemDropdown").click(function (event) {
            //querySelector returns the first occurring instance of the object passed to it
            let nextChevronIcon = document.querySelector("#" + this.id + " .sidePanelNavigationItemDropdownIcon")
            $(nextChevronIcon).toggleClass("down");
            let nextMenu = document.querySelector("#" + this.id + " .dropdownNavigationItemMenu")
            $(nextMenu).toggleClass("menuClosed");
            $(nextMenu).toggleClass("menuOpened");
        })

        //prevents the dropdown from closing when any option in it is pressed
        $(".menuItem").click(function (event) {
            event.stopPropagation();
        })

        //Prevents changing color of parent navigation item on hovering
        $(".menuItem").hover(function (event) {
            event.stopPropagation();
        })

        //When hovering on a navigation item in side panel change its color but not when it is selected (turned Blue Forever)
        $(".navigationItem").add(".navDropBox").hover(function (event) {
            let innerIcon = document.querySelector("#" + this.id + " svg")
            $(innerIcon).toggleClass("turnItBlue")

            if (!innerIcon.classList.contains("turnItBlueForever"))
                $(innerIcon).toggleClass("turnItWhite")
        });

        //Created a new class turnItBlueForever because hovering out of div was toggling off the turnItBlue class which was causing it to trn white
        //Change color when a navigation item is clicked
        $(".navigationItem").click(function (event) {
            removeFocusFromSelectedNavItems(this.id);

            let s = document.getElementById(this.id)
            s.classList.add("navigationItemSelected")
            let innerIcon = document.querySelector("#" + this.id + " svg")
            $(innerIcon).toggleClass("turnItBlueForever", true)
            innerIcon.classList.add("turnItBlue")
        });

        //When hovering-in on a dropdown in side panel
        $(".navDropBox").on("mouseover", function (event) {
            //querySelector returns the first occurring instance of the object passed to it
            let nextChevronIcon = document.querySelector("#" + this.id + " .sidePanelNavigationItemDropdownIcon")
            nextChevronIcon.setAttribute("src", "../../Assets/Images/vectorFiles/Icons/chevron-down-blue.svg")
        });

        //When hovering-out on a dropdown in side panel
        $(".navDropBox").on("mouseleave", function (event) {
            //querySelector returns the first occurring instance of the object passed to it
            let nextChevronIcon = document.querySelector("#" + this.id + " .sidePanelNavigationItemDropdownIcon")
            nextChevronIcon.setAttribute("src", "../../Assets/Images/vectorFiles/Icons/chevron-down.svg")
        });//Assets\

        $(".menuItem").click(function () {
            removeFocusFromSelectedNavItems()
            $(this).addClass("menuItemSelected")
        });


    });
}
