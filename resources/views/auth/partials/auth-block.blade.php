<script>
var LoginModalController = {
    tabsElementName: ".logmod__tabs li",
    tabElementName: ".logmod__tab",
    inputElementsName: ".logmod__form .input",
    hidePasswordName: ".hide-password",

    inputElements: null,
    tabsElement: null,
    tabElement: null,
    hidePassword: null,

    activeTab: 1,
    tabSelection: 0, // 0 - first, 1 - second
    state: 0,

    findElements: function () {
        var base = this;

        base.tabsElement = $(base.tabsElementName);
        base.tabElement = $(base.tabElementName);
        base.inputElements = $(base.inputElementsName);
        base.hidePassword = $(base.hidePasswordName);

        return base;
    },

    setState: function (state) {
        var base = this,
            elem = null;

        if (!state) {
            @if ($login_state === "login")
            state = 0;
            @else
            state = 1;
            @endif
        }

        if (base.tabsElement) {
            elem = $(base.tabsElement[state]);
            elem.addClass("current");
            $("." + elem.attr("data-tabtar")).addClass("show");
        }

        return base;
    },

    getActiveTab: function () {
        var base = this;

        base.tabsElement.each(function (i, el) {
           if ($(el).hasClass("current")) {
               base.activeTab = $(el);
           }
        });

        return base;
    },

    addClickEvents: function () {
        var base = this;

        base.hidePassword.on("click", function (e) {
            var $this = $(this),
                $pwInput = $this.prev("input");

            if ($pwInput.attr("type") == "password") {
                $pwInput.attr("type", "text");
                $this.text("Hide");
            } else {
                $pwInput.attr("type", "password");
                $this.text("Show");
            }
        });

        base.tabsElement.on("click", function (e) {
            var targetTab = $(this).attr("data-tabtar");

            e.preventDefault();
            base.activeTab.removeClass("current");
            base.activeTab = $(this);
            base.activeTab.addClass("current");

            base.tabElement.each(function (i, el) {
                el = $(el);
                el.removeClass("show");
                if (el.hasClass(targetTab)) {
                    el.addClass("show");
                }
            });
        });

        base.inputElements.find("label").on("click", function (e) {
           var $this = $(this),
               $input = $this.next("input");

            $input.focus();
        });

        return base;
    },

    initialize: function () {
        var base = this;

        base.findElements().setState().getActiveTab().addClickEvents();
    }
};

$(document).ready(function() {
    LoginModalController.initialize();
    var window_height = $( window ).height();
    $('.header.full').height(window_height);
});
</script>
<div class="logmod">
    <div class="logmod__wrapper">
        <div class="logmod__container">
            <ul class="logmod__tabs">
                <li data-tabtar="lgm-2"><a href="#">Login</a></li>
                <li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
            </ul>
            <div class="logmod__tab-wrapper">
                <div class="logmod__tab lgm-1">
                    @if (count($errors) > 0)
                        <div class="logmod__heading">
                            @foreach ($errors->all() as $error)
                            <span class="logmod__heading-subtitle error">{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    <div class="logmod__form">
                        <form accept-charset="utf-8" method="POST" action="/auth/register" class="simform">
                            {!! csrf_field() !!}
                            <div class="sminputs">
                                <div class="input string optional">
                                    <label class="string optional" for="first_name">First Name</label>
                                    <input class="string optional" maxlength="255" id="first_name" placeholder="First Name" type="text" size="50" name="first_name"/>
                                </div>
                                <div class="input string optional">
                                    <label class="string optional" for="last_name">Last Name</label></label>
                                    <input class="string optional" maxlength="255" id="last_name" placeholder="Last Name" type="text" size="50" name="last_name"/>
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input full">
                                    <label class="string optional" for="email">Email</label>
                                    <input class="string optional" maxlength="255" id="email" placeholder="Email" type="email" size="50" name="email"/>
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input string optional">
                                    <label class="string optional" for="password">Password</label>
                                    <input class="string optional" maxlength="255" id="password" placeholder="Password" type="password" size="50" name="password"/>
                                </div>
                                <div class="input string optional">
                                    <label class="string optional" for="user-pw-repeat">Repeat password</label>
                                    <input class="string optional" maxlength="255" id="user-pw-repeat" placeholder="Repeat Password" type="password" size="50" name="password_confirmation" />
                                </div>
                            </div>
                            <div class="simform__actions">
                                <input class="sumbit" name="submit" type="submit" value="Create Account" />
                                <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="logmod__tab lgm-2">
                    @if (count($errors) > 0)
                        <div class="logmod__heading">
                            @foreach ($errors->all() as $error)
                            <span class="logmod__heading-subtitle error">{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    <div class="logmod__form">
                        <form accept-charset="utf-8" method="POST" action="/auth/login" class="simform">
                            {!! csrf_field() !!}
                            <div class="sminputs">
                                <div class="input full">
                                    <label class="string optional" for="email">Emai</label>
                                    <input class="string optional" maxlength="255" id="email" placeholder="Email" type="email" size="50" name="email"/>
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input full">
                                    <label class="string optional" for="passsword">Password</label>
                                    <input class="string optional" maxlength="255" id="password" placeholder="Password" type="password" size="50" name="password"/>
                                    <span class="hide-password">Show</span>
                                </div>
                            </div>
                            <div class="simform__actions">
                                <input class="sumbit" name="commit" type="submit" value="Log In" />
                                <span class="simform__actions-sidetext"><a class="special" role="link" href="#">Forgot your password?<br>Click here</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
