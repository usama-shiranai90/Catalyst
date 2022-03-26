/*Script would load when the whole page it is associated to is loaded along with its contents*/
window.onload = function () {


    function removeFocusFromSelectedNavItems(selectedItemID) {

        //For removing focus from navigation items
        let navigators = document.querySelectorAll(".navigationItemSelected")
        navigators.forEach((item) => {
            if (item.id !== selectedItemID) {
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

function addLoader() {
    return `<div id="loader" class="hidden m-auto fixed top-1/4 left-1/2 z-5">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class=" transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- inline-block align-bottom bg-white rounded-lg text-center overflow-hidden-->
            <div class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <svg class="animate-spin fill-current text-catalystBlue-d2 opacity-100"
                     xmlns="http://www.w3.org/2000/svg"
                     width="55" height="55" viewBox="0 0 24 24">
                    <path d="M13.75 22c0 .966-.783 1.75-1.75 1.75s-1.75-.784-1.75-1.75.783-1.75 1.75-1.75 1.75.784 1.75 1.75zm-1.75-22c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 10.75c.689 0 1.249.561 1.249 1.25 0 .69-.56 1.25-1.249 1.25-.69 0-1.249-.559-1.249-1.25 0-.689.559-1.25 1.249-1.25zm-22 1.25c0 1.105.896 2 2 2s2-.895 2-2c0-1.104-.896-2-2-2s-2 .896-2 2zm19-8c.551 0 1 .449 1 1 0 .553-.449 1.002-1 1-.551 0-1-.447-1-.998 0-.553.449-1.002 1-1.002zm0 13.5c.828 0 1.5.672 1.5 1.5s-.672 1.501-1.502 1.5c-.826 0-1.498-.671-1.498-1.499 0-.829.672-1.501 1.5-1.501zm-14-14.5c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2zm0 14c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2z"/>
                </svg>
                <span class=" text-lg font-medium antialiased tracking-tighter">Loading</span>
            </div>
        </div>
    </div>
</div>`;
}