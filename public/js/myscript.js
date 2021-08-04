$(".jumbotron").css({ height: $(window).height() + "px" });

$(window).on("resize", function() {
    $(".jumbotron").css({ height: $(window).height() + "px" });
});

//start & freelancer navtabs
// assigning the variables for tabs & tab content 
const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')

// looping through the tabs on our page to assign the class 'active', customized has for visibily in our css
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabTarget)

        //removing the active class when another tab link is clicked
        tabContents.forEach(tabContent => {
            tabContent.classList.remove('active')
        })
        //removing active class for navlinks
        tabs.forEach(tab => {
            tab.classList.remove('active')
        })

        //adding active class tab for it to access the active css properties
        tab.classList.add('active')
        //adding active class tab target it to access the active css properties
        target.classList.add('active')
    })
})