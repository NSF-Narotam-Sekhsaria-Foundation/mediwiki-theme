// Add the following code to contactform7 plugin in wordpress
// Editing this page will not work or change the code untill you paste it into the plugin in wp-admin

<div class="contact-form mobile-padding">
    <div class="form-group mt-100">
        <h2>Share Your Feedback With Us:</h2>
    </div>
    <div class="form-group">
        <div class="col-offset-2">
            <h3>Did you find the information you were looking for?</h3>
        </div>
        <div class="col-sm-2 padding-left-0">
            <div class="form-check">
                <label class="form-check-label">[checkbox information-looking-for id:information-looking-for class:form-check-input default:off exclusive "Yes" "No"]</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-offset-2">
            <h3>Please tell us how easy it is to find information on the site.</h3>
        </div>
        <div class="col-sm-4 padding-left-0">
            <div class="form-check">
                <label class="form-check-label">[checkbox how-easy-it-is-to-find id:how-easy-it-is-to-find class:form-check-label default:off exclusive "Easy" "Was able to find with some difficulty" "Difficulty" ]</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <h3>Questions / Suggestions:</h3>
        <p> We welcome your suggestions on specific areas for improvement. If you have any questions / feedback, please enter them in the textbox below. We will try to be as prompt as possible with our replies. However, please allow us a week to get back to any query that you may have.</p>
    </div>
    <div class="form-group">
        <div class="col-xs-12 col-md-5 padding-left-0 padding-right-0">
            [textarea questions-suggestions 20x7 id:questions-suggestions class:form-control]
            [submit class:btn class:btn-default "Submit"]
        </div>
    </div>

</div>