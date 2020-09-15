<?php include_once 'header.php'; ?>
</div>
</div>

<script>
$(function () {
                var demos = ['save']
                $.each(demos, function (i, d) {
                    var demo = $('div#' + d)
                    $('<div class="demo"></div>').appendTo(demo)
                })
            })
</script>

<div id="main-wrapper">
    <div class="container">
        <header class="major" style="margin-bottom: 1.5em;">
            <h2>Matchplay</h2>
        </header>
            <div id="main" style="align: center;">
                <div id="save" style="display: inline-block;">

                </div>
            </div>

            <script type="text/javascript">
            var doubleElimination = {
                teams : [
                    ["Person 1",  "Person 2" ],
                    ["Person 3",  "Person 4" ],
                    ["Person 5",  "Person 6" ],
                    ["Person 7",  "Person 8" ],
                    ["Person 9",  "Person 10"],
                    ["Person 11", "Person 12"],
                    ["Person 13", "Person 14"],
                    ["Person 15", "Person 16"]
                ],
                results : [[ /* WINNER BRACKET */
                    [[3,5], [2,4], [6,3], [2,3], [1,5], [5,3], [7,2], [1,2]],
                    [[1,2], [3,4], [5,6], [7,8]],
                    [[9,1], [8,2]],
                    [[1,3]]
                ], [         /* LOSER BRACKET */
                    [[5,1], [1,2], [3,2], [6,9]],
                    [[8,2], [1,2], [6,2], [1,3]],
                    [[1,2], [3,1]],
                    [[3,0], [1,9]],
                    [[3,2]],
                    [[4,2]]
                ], [         /* FINALS */
                    [[3,8], [1,2]],
                    [[2,1]]
                ]]
                }
                /* Called whenever bracket is modified
                *
                * data:     changed bracket object in format given to init
                * userData: optional data given when bracket is created.
                */
                function saveFn(data, userData) {
                    var json = jQuery.toJSON(data)

                    $('#saveOutput').text(JSON.stringify(data, null, 2))
                    /* You probably want to do something like this
                    jQuery.ajax("rest/"+userData, {contentType: 'application/json',
                    dataType: 'json',
                    type: 'post',
                    data: json})
                    */
                }

                /*for flag*/
                /* Edit function is called when team label is clicked */
                function edit_fn(container, data, doneCb) {
                    var input = $('<input type="text">')
                    input.val(data ? data.flag + ':' + data.name : '')
                    container.html(input)
                    input.focus()
                    input.blur(function () {
                        var inputValue = input.val()
                        if (inputValue.length === 0) {
                            doneCb(null); // Drop the team and replace with BYE
                        } else {
                            var flagAndName = inputValue.split(':') // Expects correct input
                            doneCb({flag: flagAndName[0], name: flagAndName[1]})
                        }
                    })
                }

                /* Render function is called for each team label when data is changed, data
                * contains the data object given in init and belonging to this slot.
                *
                * 'state' is one of the following strings:
                * - empty-bye: No data or score and there won't team advancing to this place
                * - empty-tbd: No data or score yet. A team will advance here later
                * - entry-no-score: Data available, but no score given yet
                * - entry-default-win: Data available, score will never be given as opponent is BYE
                * - entry-complete: Data and score available
                */
                function render_fn(container, data, score, state) {
                    switch (state) {
                        case "empty-bye":
                            container.append("No team")
                            return;
                        case "empty-tbd":
                            container.append("Upcoming")
                            return;


                    }
                }

                $(function () {
                    $('div#save .demo').bracket({
                        teamWidth: 100,
                        scoreWidth: 40,
                        matchMargin: 50,
                        roundMargin: 50,
                        centerConnectors: true,
                        init: doubleElimination,
                        render: render_fn
                    })
                })

            </script>
    </div>
</div>

<?php include_once 'footer.php'; ?>




