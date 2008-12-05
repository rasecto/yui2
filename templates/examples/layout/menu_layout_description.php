<h2 class="first">Create the Full Page Layout</h2>

<p>First we will create the Full Page Layout with the following HTML.</p>

<textarea name="code" class="HTML">
<body class=" yui-skin-sam">
<div id="top1"></div>
<div id="bottom1"></div>
<div id="right1"></div>
<div id="left1"></div>
<div id="center1"></div>
</body>
</textarea>

<p>Now we will create the Layout instance for this content.</p>

<textarea name="code" class="JScript">
Event.onDOMReady(function() {
    var layout = new YAHOO.widget.Layout({
        units: [
            { position: 'top', height: 28, body: 'top1' },
            { position: 'right', header: 'Right', width: 300, resize: true, footer: 'Footer', collapse: true, scroll: true, body: 'right1', animate: true, gutter: '5' },
            { position: 'bottom', height: 30, body: 'bottom1' },
            { position: 'left', header: 'Left', width: 200, body: 'left1', gutter: '5' },
            { position: 'center', body: 'center1', gutter: '5 0' }
        ]
    });
    
    layout.render();
});
</textarea>

<h2>Creating the Menus</h2>

<p>To create our Menu's we will borrow the code from these examples: <a href="http://developer.yahoo.com/yui/examples/menu/topnavfromjs.html">Website Top Nav With Submenus From JavaScript</a> and <a href="http://developer.yahoo.com/yui/examples/menu/leftnavfromjs.html">Website Left Nav With Submenus From JavaScript</a></p>
<p>We will create 2 private functions that will create our menus: <code>initTopMenu</code> and <code>initLeftMenu</code>.</p>

<h3>Top Menu</h3>
<textarea name="code" class="JScript">
        var initTopMenu = function() {
                /*
                     Instantiate a MenuBar:  The first argument passed to the 
                     constructor is the id of the element in the page 
                     representing the MenuBar; the second is an object literal 
                     of configuration properties.
                */

                var oMenuBar = new YAHOO.widget.MenuBar("productsandservices", { 
                                                            autosubmenudisplay: true, 
                                                            hidedelay: 750, 
                                                            lazyload: true,
                                                            effect: { 
                                                                effect: YAHOO.widget.ContainerEffect.FADE,
                                                                duration: 0.25
                                                            } 
                                                        });

                /*
                     Define an array of object literals, each containing 
                     the data necessary to create a submenu.
                */

                var aSubmenuData = [
                
                    {
                        id: "communication", 
                        itemdata: [ 
                            { text: "360", url: "http://360.yahoo.com" },
                            { text: "Alerts", url: "http://alerts.yahoo.com" },
                            { text: "Avatars", url: "http://avatars.yahoo.com" },
                            { text: "Groups", url: "http://groups.yahoo.com " },
                            { text: "Internet Access", url: "http://promo.yahoo.com/broadband" },
                            {
                                text: "PIM", 
                                submenu: { 
                                            id: "pim", 
                                            itemdata: [
                                                { text: "Yahoo! Mail", url: "http://mail.yahoo.com" },
                                                { text: "Yahoo! Address Book", url: "http://addressbook.yahoo.com" },
                                                { text: "Yahoo! Calendar",  url: "http://calendar.yahoo.com" },
                                                { text: "Yahoo! Notepad", url: "http://notepad.yahoo.com" }
                                            ] 
                                        }
                            
                            }, 
                            { text: "Member Directory", url: "http://members.yahoo.com" },
                            { text: "Messenger", url: "http://messenger.yahoo.com" },
                            { text: "Mobile", url: "http://mobile.yahoo.com" },
                            { text: "Flickr Photo Sharing", url: "http://www.flickr.com" },
                        ]
                    },

                    {
                        id: "shopping", 
                        itemdata: [
                            { text: "Auctions", url: "http://auctions.shopping.yahoo.com" },
                            { text: "Autos", url: "http://autos.yahoo.com" },
                            { text: "Classifieds", url: "http://classifieds.yahoo.com" },
                            { text: "Flowers & Gifts", url: "http://shopping.yahoo.com/b:Flowers%20%26%20Gifts:20146735" },
                            { text: "Real Estate", url: "http://realestate.yahoo.com" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "Wallet", url: "http://wallet.yahoo.com" },
                            { text: "Yellow Pages", url: "http://yp.yahoo.com" }                    
                        ]    
                    },
                    
                    {
                        id: "entertainment", 
                        itemdata: [
                            { text: "Fantasy Sports", url: "http://fantasysports.yahoo.com" },
                            { text: "Games", url: "http://games.yahoo.com" },
                            { text: "Kids", url: "http://www.yahooligans.com" },
                            { text: "Music", url: "http://music.yahoo.com" },
                            { text: "Movies", url: "http://movies.yahoo.com" },
                            { text: "Radio", url: "http://music.yahoo.com/launchcast" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "TV", url: "http://tv.yahoo.com" }              
                        ] 
                    },
                    
                    {
                        id: "information",
                        itemdata: [
                            { text: "Downloads", url: "http://downloads.yahoo.com" },
                            { text: "Finance", url: "http://finance.yahoo.com" },
                            { text: "Health", url: "http://health.yahoo.com" },
                            { text: "Local", url: "http://local.yahoo.com" },
                            { text: "Maps & Directions", url: "http://maps.yahoo.com" },
                            { text: "My Yahoo!", url: "http://my.yahoo.com" },
                            { text: "News", url: "http://news.yahoo.com" },
                            { text: "Search", url: "http://search.yahoo.com" },
                            { text: "Small Business", url: "http://smallbusiness.yahoo.com" },
                            { text: "Weather", url: "http://weather.yahoo.com" }
                        ]
                    }                    
                ];


                /*
                     Subscribe to the "beforerender" event, adding a submenu 
                     to each of the items in the MenuBar instance.
                */

                oMenuBar.subscribe("beforeRender", function () {

                    if (this.getRoot() == this) {

                        this.getItem(0).cfg.setProperty("submenu", aSubmenuData[0]);
                        this.getItem(1).cfg.setProperty("submenu", aSubmenuData[1]);
                        this.getItem(2).cfg.setProperty("submenu", aSubmenuData[2]);
                        this.getItem(3).cfg.setProperty("submenu", aSubmenuData[3]);

                    }

                });


                /*
                     Call the "render" method with no arguments since the 
                     markup for this MenuBar instance is already exists in 
                     the page.
                */

                oMenuBar.render();         
        };

</textarea>

<h3>Left Menu</h3>
<textarea name="code" class="JScript">
        var initLeftMenu = function() {
                /*
                     Instantiate a Menu:  The first argument passed to the 
                     constructor is the id of the element in the page 
                     representing the Menu; the second is an object literal 
                     of configuration properties.
                */

                var oMenu = new YAHOO.widget.Menu("productsandservices2", { 
                                                        position: "static", 
                                                        hidedelay:  750, 
                                                        lazyload: true,
                                                            effect: { 
                                                                effect: YAHOO.widget.ContainerEffect.FADE,
                                                                duration: 0.25
                                                            } 
                                                        });


                /*
                     Define an array of object literals, each containing 
                     the data necessary to create a submenu.
                */

                var aSubmenuData = [
                
                    {
                        id: "communication2", 
                        itemdata: [ 
                            { text: "360", url: "http://360.yahoo.com" },
                            { text: "Alerts", url: "http://alerts.yahoo.com" },
                            { text: "Avatars", url: "http://avatars.yahoo.com" },
                            { text: "Groups", url: "http://groups.yahoo.com " },
                            { text: "Internet Access", url: "http://promo.yahoo.com/broadband" },
                            {
                                text: "PIM", 
                                submenu: { 
                                            id: "pim2", 
                                            itemdata: [
                                                { text: "Yahoo! Mail", url: "http://mail.yahoo.com" },
                                                { text: "Yahoo! Address Book", url: "http://addressbook.yahoo.com" },
                                                { text: "Yahoo! Calendar",  url: "http://calendar.yahoo.com" },
                                                { text: "Yahoo! Notepad", url: "http://notepad.yahoo.com" }
                                            ] 
                                        }
                            
                            }, 
                            { text: "Member Directory", url: "http://members.yahoo.com" },
                            { text: "Messenger", url: "http://messenger.yahoo.com" },
                            { text: "Mobile", url: "http://mobile.yahoo.com" },
                            { text: "Flickr Photo Sharing", url: "http://www.flickr.com" },
                        ]
                    },

                    {
                        id: "shopping2", 
                        itemdata: [
                            { text: "Auctions", url: "http://auctions.shopping.yahoo.com" },
                            { text: "Autos", url: "http://autos.yahoo.com" },
                            { text: "Classifieds", url: "http://classifieds.yahoo.com" },
                            { text: "Flowers & Gifts", url: "http://shopping.yahoo.com/b:Flowers%20%26%20Gifts:20146735" },
                            { text: "Real Estate", url: "http://realestate.yahoo.com" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "Wallet", url: "http://wallet.yahoo.com" },
                            { text: "Yellow Pages", url: "http://yp.yahoo.com" }                    
                        ]    
                    },
                    
                    {
                        id: "entertainment2", 
                        itemdata: [
                            { text: "Fantasy Sports", url: "http://fantasysports.yahoo.com" },
                            { text: "Games", url: "http://games.yahoo.com" },
                            { text: "Kids", url: "http://www.yahooligans.com" },
                            { text: "Music", url: "http://music.yahoo.com" },
                            { text: "Movies", url: "http://movies.yahoo.com" },
                            { text: "Radio", url: "http://music.yahoo.com/launchcast" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "TV", url: "http://tv.yahoo.com" }              
                        ] 
                    },
                    
                    {
                        id: "information2",
                        itemdata: [
                            { text: "Downloads", url: "http://downloads.yahoo.com" },
                            { text: "Finance", url: "http://finance.yahoo.com" },
                            { text: "Health", url: "http://health.yahoo.com" },
                            { text: "Local", url: "http://local.yahoo.com" },
                            { text: "Maps & Directions", url: "http://maps.yahoo.com" },
                            { text: "My Yahoo!", url: "http://my.yahoo.com" },
                            { text: "News", url: "http://news.yahoo.com" },
                            { text: "Search", url: "http://search.yahoo.com" },
                            { text: "Small Business", url: "http://smallbusiness.yahoo.com" },
                            { text: "Weather", url: "http://weather.yahoo.com" }
                        ]
                    }                    
                ];


                // Subscribe to the Menu instance's "beforeRender" event

                oMenu.subscribe("beforeRender", function () {

                    if (this.getRoot() == this) {

                        this.getItem(0).cfg.setProperty("submenu", aSubmenuData[0]);
                        this.getItem(1).cfg.setProperty("submenu", aSubmenuData[1]);
                        this.getItem(2).cfg.setProperty("submenu", aSubmenuData[2]);
                        this.getItem(3).cfg.setProperty("submenu", aSubmenuData[3]);

                    }

                });
                

                /*
                     Call the "render" method with no arguments since the 
                     markup for this Menu instance is already exists in the page.
                */

                oMenu.render();
        };
</textarea>

<h2>Rendering the Menus</h2>
<p>Now that we have the Menu Controls all set up, we will listen for the Layout's render event and render our Menu's.</p>
<p>Just before we call <code>render</code> on the layout, let's listen for the <code>render</code> event and call our private methods.</p>
<textarea name="code" class="JScript">
layout.on('render', function() {
    YAHOO.util.Event.onContentReady("productsandservices", initTopMenu);
    YAHOO.util.Event.onContentReady("productsandservices2", initLeftMenu);        
});

layout.render();
</textarea>

<h2>Fixing the hidden Menus</h2>
<p>Now that we have Menu's on the page, you will notice that the menu items will not escape the Layout Unit.</p>
<p>We can fix this by adding a few more config options to the Layout Unit's. Specifically the <code>scroll</code> and <code>zIndex</code> options.</p>
<p><code>scroll</code>: The scroll property has 3 possible values: <code>true</code>, <code>false</code> and <code>null</code>. 
By setting the scroll property to null, the Layout Unit will not be wrapped in an element with the overflow CSS property on it. Now it will allow for items to escape the unit's body.</p>
<p><code>zIndex</code>: The zIndex property will set the Layout Units wrap element to that zIndex (defaults to 0).</p>
<p>So in the code below, we have set <code>scroll</code> to <code>null</code> on the top and left Layout Units to allow the menus to escape the Layout Units. We have given the top Layout Unit a <code>zIndex</code> of <code>2</code> and
the left Layout Unit a <code>zIndex</code> of <code>1</code>. This way the menus from the top Layout Unit will overlap the left Layout Unit. But the menu in the left Layout Unit will overlap the center Layout Unit.</p>
<textarea name="code" class="JScript">
{ position: 'top', height: 28, body: 'top1', scroll: null, zIndex: 2 },
{ position: 'left', header: 'Left', width: 200, body: 'left1', gutter: '5', scroll: null, zIndex: 1 },
</textarea>

<h2>Source for the example</h2>
<textarea name="code" class="JScript">
(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;


        var initTopMenu = function() {
                /*
                     Instantiate a MenuBar:  The first argument passed to the 
                     constructor is the id of the element in the page 
                     representing the MenuBar; the second is an object literal 
                     of configuration properties.
                */

                var oMenuBar = new YAHOO.widget.MenuBar("productsandservices", { 
                                                            autosubmenudisplay: true, 
                                                            hidedelay: 750, 
                                                            lazyload: true,
                                                            effect: { 
                                                                effect: YAHOO.widget.ContainerEffect.FADE,
                                                                duration: 0.25
                                                            } 
                                                        });

                /*
                     Define an array of object literals, each containing 
                     the data necessary to create a submenu.
                */

                var aSubmenuData = [
                
                    {
                        id: "communication", 
                        itemdata: [ 
                            { text: "360", url: "http://360.yahoo.com" },
                            { text: "Alerts", url: "http://alerts.yahoo.com" },
                            { text: "Avatars", url: "http://avatars.yahoo.com" },
                            { text: "Groups", url: "http://groups.yahoo.com " },
                            { text: "Internet Access", url: "http://promo.yahoo.com/broadband" },
                            {
                                text: "PIM", 
                                submenu: { 
                                            id: "pim", 
                                            itemdata: [
                                                { text: "Yahoo! Mail", url: "http://mail.yahoo.com" },
                                                { text: "Yahoo! Address Book", url: "http://addressbook.yahoo.com" },
                                                { text: "Yahoo! Calendar",  url: "http://calendar.yahoo.com" },
                                                { text: "Yahoo! Notepad", url: "http://notepad.yahoo.com" }
                                            ] 
                                        }
                            
                            }, 
                            { text: "Member Directory", url: "http://members.yahoo.com" },
                            { text: "Messenger", url: "http://messenger.yahoo.com" },
                            { text: "Mobile", url: "http://mobile.yahoo.com" },
                            { text: "Flickr Photo Sharing", url: "http://www.flickr.com" },
                        ]
                    },

                    {
                        id: "shopping", 
                        itemdata: [
                            { text: "Auctions", url: "http://auctions.shopping.yahoo.com" },
                            { text: "Autos", url: "http://autos.yahoo.com" },
                            { text: "Classifieds", url: "http://classifieds.yahoo.com" },
                            { text: "Flowers & Gifts", url: "http://shopping.yahoo.com/b:Flowers%20%26%20Gifts:20146735" },
                            { text: "Real Estate", url: "http://realestate.yahoo.com" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "Wallet", url: "http://wallet.yahoo.com" },
                            { text: "Yellow Pages", url: "http://yp.yahoo.com" }                    
                        ]    
                    },
                    
                    {
                        id: "entertainment", 
                        itemdata: [
                            { text: "Fantasy Sports", url: "http://fantasysports.yahoo.com" },
                            { text: "Games", url: "http://games.yahoo.com" },
                            { text: "Kids", url: "http://www.yahooligans.com" },
                            { text: "Music", url: "http://music.yahoo.com" },
                            { text: "Movies", url: "http://movies.yahoo.com" },
                            { text: "Radio", url: "http://music.yahoo.com/launchcast" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "TV", url: "http://tv.yahoo.com" }              
                        ] 
                    },
                    
                    {
                        id: "information",
                        itemdata: [
                            { text: "Downloads", url: "http://downloads.yahoo.com" },
                            { text: "Finance", url: "http://finance.yahoo.com" },
                            { text: "Health", url: "http://health.yahoo.com" },
                            { text: "Local", url: "http://local.yahoo.com" },
                            { text: "Maps & Directions", url: "http://maps.yahoo.com" },
                            { text: "My Yahoo!", url: "http://my.yahoo.com" },
                            { text: "News", url: "http://news.yahoo.com" },
                            { text: "Search", url: "http://search.yahoo.com" },
                            { text: "Small Business", url: "http://smallbusiness.yahoo.com" },
                            { text: "Weather", url: "http://weather.yahoo.com" }
                        ]
                    }                    
                ];


                /*
                     Subscribe to the "beforerender" event, adding a submenu 
                     to each of the items in the MenuBar instance.
                */

                oMenuBar.subscribe("beforeRender", function () {

                    if (this.getRoot() == this) {

                        this.getItem(0).cfg.setProperty("submenu", aSubmenuData[0]);
                        this.getItem(1).cfg.setProperty("submenu", aSubmenuData[1]);
                        this.getItem(2).cfg.setProperty("submenu", aSubmenuData[2]);
                        this.getItem(3).cfg.setProperty("submenu", aSubmenuData[3]);

                    }

                });


                /*
                     Call the "render" method with no arguments since the 
                     markup for this MenuBar instance is already exists in 
                     the page.
                */

                oMenuBar.render();         
        };

        var initLeftMenu = function() {
                /*
                     Instantiate a Menu:  The first argument passed to the 
                     constructor is the id of the element in the page 
                     representing the Menu; the second is an object literal 
                     of configuration properties.
                */

                var oMenu = new YAHOO.widget.Menu("productsandservices2", { 
                                                        position: "static", 
                                                        hidedelay:  750, 
                                                        lazyload: true,
                                                            effect: { 
                                                                effect: YAHOO.widget.ContainerEffect.FADE,
                                                                duration: 0.25
                                                            } 
                                                        });


                /*
                     Define an array of object literals, each containing 
                     the data necessary to create a submenu.
                */

                var aSubmenuData = [
                
                    {
                        id: "communication2", 
                        itemdata: [ 
                            { text: "360", url: "http://360.yahoo.com" },
                            { text: "Alerts", url: "http://alerts.yahoo.com" },
                            { text: "Avatars", url: "http://avatars.yahoo.com" },
                            { text: "Groups", url: "http://groups.yahoo.com " },
                            { text: "Internet Access", url: "http://promo.yahoo.com/broadband" },
                            {
                                text: "PIM", 
                                submenu: { 
                                            id: "pim2", 
                                            itemdata: [
                                                { text: "Yahoo! Mail", url: "http://mail.yahoo.com" },
                                                { text: "Yahoo! Address Book", url: "http://addressbook.yahoo.com" },
                                                { text: "Yahoo! Calendar",  url: "http://calendar.yahoo.com" },
                                                { text: "Yahoo! Notepad", url: "http://notepad.yahoo.com" }
                                            ] 
                                        }
                            
                            }, 
                            { text: "Member Directory", url: "http://members.yahoo.com" },
                            { text: "Messenger", url: "http://messenger.yahoo.com" },
                            { text: "Mobile", url: "http://mobile.yahoo.com" },
                            { text: "Flickr Photo Sharing", url: "http://www.flickr.com" },
                        ]
                    },

                    {
                        id: "shopping2", 
                        itemdata: [
                            { text: "Auctions", url: "http://auctions.shopping.yahoo.com" },
                            { text: "Autos", url: "http://autos.yahoo.com" },
                            { text: "Classifieds", url: "http://classifieds.yahoo.com" },
                            { text: "Flowers & Gifts", url: "http://shopping.yahoo.com/b:Flowers%20%26%20Gifts:20146735" },
                            { text: "Real Estate", url: "http://realestate.yahoo.com" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "Wallet", url: "http://wallet.yahoo.com" },
                            { text: "Yellow Pages", url: "http://yp.yahoo.com" }                    
                        ]    
                    },
                    
                    {
                        id: "entertainment2", 
                        itemdata: [
                            { text: "Fantasy Sports", url: "http://fantasysports.yahoo.com" },
                            { text: "Games", url: "http://games.yahoo.com" },
                            { text: "Kids", url: "http://www.yahooligans.com" },
                            { text: "Music", url: "http://music.yahoo.com" },
                            { text: "Movies", url: "http://movies.yahoo.com" },
                            { text: "Radio", url: "http://music.yahoo.com/launchcast" },
                            { text: "Travel", url: "http://travel.yahoo.com" },
                            { text: "TV", url: "http://tv.yahoo.com" }              
                        ] 
                    },
                    
                    {
                        id: "information2",
                        itemdata: [
                            { text: "Downloads", url: "http://downloads.yahoo.com" },
                            { text: "Finance", url: "http://finance.yahoo.com" },
                            { text: "Health", url: "http://health.yahoo.com" },
                            { text: "Local", url: "http://local.yahoo.com" },
                            { text: "Maps & Directions", url: "http://maps.yahoo.com" },
                            { text: "My Yahoo!", url: "http://my.yahoo.com" },
                            { text: "News", url: "http://news.yahoo.com" },
                            { text: "Search", url: "http://search.yahoo.com" },
                            { text: "Small Business", url: "http://smallbusiness.yahoo.com" },
                            { text: "Weather", url: "http://weather.yahoo.com" }
                        ]
                    }                    
                ];


                // Subscribe to the Menu instance's "beforeRender" event

                oMenu.subscribe("beforeRender", function () {

                    if (this.getRoot() == this) {

                        this.getItem(0).cfg.setProperty("submenu", aSubmenuData[0]);
                        this.getItem(1).cfg.setProperty("submenu", aSubmenuData[1]);
                        this.getItem(2).cfg.setProperty("submenu", aSubmenuData[2]);
                        this.getItem(3).cfg.setProperty("submenu", aSubmenuData[3]);

                    }

                });
                

                /*
                     Call the "render" method with no arguments since the 
                     markup for this Menu instance is already exists in the page.
                */

                oMenu.render();
        };


    Event.onDOMReady(function() {
        var layout = new YAHOO.widget.Layout({
            units: [
                { position: 'top', height: 28, body: 'top1', scroll: null, zIndex: 2 },
                { position: 'right', header: 'Right', width: 300, resize: true, footer: 'Footer', collapse: true, scroll: true, body: 'right1', animate: true, gutter: '5' },
                { position: 'bottom', height: 30, body: 'bottom1' },
                { position: 'left', header: 'Left', width: 200, body: 'left1', gutter: '5', scroll: null, zIndex: 1 },
                { position: 'center', body: 'center1', gutter: '5 0' }
            ]
        });
        
        layout.on('render', function() {
            YAHOO.util.Event.onContentReady("productsandservices", initTopMenu);
            YAHOO.util.Event.onContentReady("productsandservices2", initLeftMenu);        
        });
        
        layout.render();
    });
})();
</textarea>
