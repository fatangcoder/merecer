
<?php   include('index.php'); ?>
<div class="aside-wrap account-login visible-md visible-lg open" ng-class="{'open':$ctrl.ItxHeaderFct.getIsVisibleLogin()}" click-outside="$ctrl.ItxHeaderFct.toggleLogin(true)" outside-if-not="header" style="">
    <!-- ngIf: $ctrl.userJsonType -->
    <itx-user-access data="'side'" close-dialog="$ctrl.ItxHeaderFct.toggleLogin()" ng-if="$ctrl.userJsonType" class="ng-scope ng-isolate-scope">
        <div id="user-access" class="container-dialog container-table">
            <div class="clearfix"></div>
            <!-- ngIf: userAccessCtrl.itxErrorMessagesFct.getLast('userAccessCtrl', 'ERROR') -->
            <div class="header-icon ma-user-access" ng-hide="userAccessCtrl.accessingToViewOrders"><i class="hidden-xs text-center icon icon-close-modal icon-right" ng-click="userAccessCtrl.closeDialog()" active="userAccessCtrl.data"></i></div>
            <div class="content-table" ng-class="{'accessing-to-view-orders':userAccessCtrl.accessingToViewOrders}">
                <header class="row hidden-xs header-user" ng-hide="userAccessCtrl.accessingToViewOrders">
                    <div class="hidden-md hidden-lg col-xs-6 text-left active" ng-class="{'active': userAccessCtrl.isActive('login')}" ng-click="userAccessCtrl.show('login')" ng-show="userAccessCtrl.isActive('register,login')" style=""><span class="ng-binding"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Start a session</font></font></span></div>
                    <div class="hidden-md hidden-lg col-xs-6 text-right ng-isolate-scope" ng-class="{'active': userAccessCtrl.isActive('register')}" im-access-event="" category="acceso_login" action="registrarse" ng-click="userAccessCtrl.show('register')" ng-show="userAccessCtrl.isActive('register,login')"><span class="ng-binding"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Create an account</font></font></span></div>
                </header>
                <div class="content-dialog" ng-transclude="">
                    <itx-login user-login="$parent.userAccessCtrl.login" on-login="$ctrl.onLogin()" on-validation-error="$parent.userAccessCtrl.showVerificationModal(email)" class="ng-scope ng-isolate-scope">
                        <!-- ngIf: loginCtrl.userAccessCtrl.isActive('login') -->
                        <div id="login" class="container-dialog ma-login ng-scope" ng-if="loginCtrl.userAccessCtrl.isActive('login')" style="">
                            <!-- ngIf: loginCtrl.userAccessCtrl.isActive('login') && !loginCtrl.userAccessCtrl.accessingToViewOrders -->
                            <header class="visible-xs ng-scope" ng-if="loginCtrl.userAccessCtrl.isActive('login') &amp;&amp; !loginCtrl.userAccessCtrl.accessingToViewOrders">
                                <div class="action-left"><i class="icon icon-arrow-prev icon-left ng-isolate-scope" ng-click="loginCtrl.userAccessCtrl.closeDialog()" im-close-popup=""></i></div>
                                <h2 class="ng-binding"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CHECK IN</font></font></h2></header>
                            <!-- end ngIf: loginCtrl.userAccessCtrl.isActive('login') && !loginCtrl.userAccessCtrl.accessingToViewOrders -->
                            <div class="content">
                                <!-- ngIf: loginCtrl.totalTries < 2  && !loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                <p class="info-popup subtitle hidden-lg hidden-md ng-binding ng-scope" ng-if="loginCtrl.totalTries < 2  &amp;&amp; !loginCtrl.userAccessCtrl.accessingToViewOrders"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enter your email address and password to access</font></font>
                                </p>
                                <!-- end ngIf: loginCtrl.totalTries < 2  && !loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                <!-- ngIf: loginCtrl.totalTries >= 2 && !loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                <div class="head text-center hidden-sm hidden-xs" ng-class="{'hidden-sm':!loginCtrl.userAccessCtrl.accessingToViewOrders, 'hidden-xs':!loginCtrl.userAccessCtrl.accessingToViewOrders}"><i class="icon-md linicon-user"></i>
                                    <p class="title ng-binding"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Start a session</font></font>
                                    </p>
                                    <!-- ngIf: loginCtrl.totalTries >= 2 && !loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                </div>
                                <!-- ngIf: loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                <!-- ngIf: loginCtrl.userAccessCtrl.itxErrorMessagesFct.getLast('userAccessCtrl', 'ERROR') -->
                                <form name="loginCtrl.loginForm" novalidate="" ng-submit="loginCtrl.login()" autocomplete="off" data-hj-masked="" class="ng-pristine ng-invalid ng-invalid-required ng-valid-email">
                                    <div class="row row-inputs">
                                        <!-- ngIf: loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                        <div class="form-group col-xs-12 col-sm-6 col-md-12 has-feedback">
                                            <input name="email" type="email" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-email" placeholder="Электронный адрес*" ng-model="loginCtrl.email" required="" itx-email="" ng-model-options="{ updateOn: 'blur' }">
                                            <!-- ngIf: loginCtrl.loginForm.email.$dirty || loginCtrl.loginForm.$submitted -->
                                            <!-- ngIf: loginCtrl.loginForm.email.$dirty || loginCtrl.loginForm.$submitted -->
                                        </div>
                                        <!-- ngIf: loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                        <!-- ngIf: loginCtrl.userAccessCtrl.accessingToViewOrders -->
                                        <div class="form-group col-xs-12 col-sm-6 col-md-12 has-feedback">
                                            <input name="password" type="password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="Пароль*" ng-model="loginCtrl.loginModel.password" ng-model-options="{ updateOn: 'blur' }" required="">
                                            <itx-toggle-password label="ПОКАЗАТЬ" class="ng-isolate-scope"><i class="form-control-feedback form-control-feedback-password icon icon-m-contrasena-ver"></i></itx-toggle-password>
                                            <!-- ngIf: loginCtrl.loginForm.password.$dirty || loginCtrl.loginForm.$submitted -->
                                        </div>
                                        <!-- ngIf: loginCtrl.showValidation -->
                                    </div>
                                    <div class="text-xs-center text-sm-right"><a class="btn btn-link btn-remember ng-binding ng-isolate-scope" ng-click="loginCtrl.userAccessCtrl.showRecover(loginCtrl.email)" im-access-event="" category="acceso_login" action="recuperar_contrasena"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Forgot your password?</font></font></a></div>
                                    <div class="form-group form-check" ng-hide="loginCtrl.userAccessCtrl.accessingToViewOrders">
                                        <!-- ngIf: ::loginCtrl.rememberMeAllowed -->
                                        <div class="text-left ng-scope" ng-if="::loginCtrl.rememberMeAllowed">
                                            <input id="rememberMe-443" name="rememberMe-443" type="checkbox" ng-model="loginCtrl.loginModel.rememberMe" class="ng-pristine ng-untouched ng-valid ng-empty">
                                            <label for="rememberMe-443"><i class="icon icon-check"></i> <span class="ng-binding"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Do not close the session</font></font></span></label>
                                        </div>
                                        <!-- end ngIf: ::loginCtrl.rememberMeAllowed -->
                                    </div>
                                    <div class="col-sm-12 btn-popup hidden-xs text-center">
                                        <button type="submit" class="btn btn-primary btn-sm ng-binding"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Start a session</font></font>
                                        </button>
                                    </div>
                                    <div class="col-sm-12 btn-popup hidden-xs text-center m-t-20">
                                        <itx-facebook-login on-login="loginCtrl.onLogin()" btn-class="btn-sm" class="ng-isolate-scope">
                                            <!-- ngIf: facebookLoginCtrl.showFbLogin -->
                                            <button type="button" class="btn btn-facebook btn-sm" ng-if="facebookLoginCtrl.showFbLogin" ng-click="facebookLoginCtrl.login()"><i class="icon icon-facebook" ng-click="socialLinksCtrl.openSocial(socialLink)"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> LOG IN WITH FACEBOOK</font></font>
                                            </button>
                                            <!-- end ngIf: facebookLoginCtrl.showFbLogin -->
                                        </itx-facebook-login>
                                    </div>
                                    <div class="visible-xs">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block btn-inicio-sesion-xs visible-xs ng-binding"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Start a session</font></font>
                                        </button>
                                        <button class="btn btn-default btn-sm btn-block visible-xs ng-binding" ng-hide="loginCtrl.userAccessCtrl.accessingToViewOrders" ng-click="loginCtrl.userAccessCtrl.show('register')"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Create an account</font></font>
                                        </button>
                                        <itx-facebook-login on-login="loginCtrl.onLogin()" btn-class="btn-sm btn-block m-t-15" class="ng-isolate-scope">
                                            <!-- ngIf: facebookLoginCtrl.showFbLogin -->
                                            <button type="button" class="btn btn-facebook btn-sm btn-block m-t-15" ng-if="facebookLoginCtrl.showFbLogin" ng-click="facebookLoginCtrl.login()"><i class="icon icon-facebook" ng-click="socialLinksCtrl.openSocial(socialLink)"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> LOG IN WITH FACEBOOK</font></font>
                                            </button>
                                            <!-- end ngIf: facebookLoginCtrl.showFbLogin -->
                                        </itx-facebook-login>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end ngIf: loginCtrl.userAccessCtrl.isActive('login') -->
                    </itx-login>
                </div>
            </div>
        </div>
        <div class="visible-md visible-lg" ng-hide="userAccessCtrl.accessingToViewOrders"><span class="subtitle question-account ng-binding" ng-show="userAccessCtrl.isActive('login')"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You do not have an account?</font></font></span></div>
        <div class="visible-md visible-lg" ng-show="userAccessCtrl.isActive('login') &amp;&amp; userAccessCtrl.data.toString() === 'side'">
            <button type="submit" class="btn btn-default btn-block ng-binding ng-isolate-scope" im-access-event="" category="acceso_login" action="registrarse" ng-click="userAccessCtrl.showRegister()"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Create an account</font></font>
            </button>
        </div>
        <!-- ngIf: userAccessCtrl.itxErrorMessagesFct.getLast('userAccessCtrl', 'ERROR') -->
    </itx-user-access>
    <!-- end ngIf: $ctrl.userJsonType -->
</div>