$(function(){

    var requiredCheckboxes = $(':checkbox[required]');

    requiredCheckboxes.change(function(){

        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        }

        else {
            requiredCheckboxes.attr('required', 'required');
        }
    });

});

function formatRepo (repo) {
	console.log(repo);
  if (repo.loading) return repo.text;

  var markup = "<div class='select2-result-repository clearfix'>" +
    "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
    "<div class='select2-result-repository__meta'>" +
      "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

  if (repo.description) {
    markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
  }

  markup += "<div class='select2-result-repository__statistics'>" +
    "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
    "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
    "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
  "</div>" +
  "</div></div>";

  return markup;
}

function formatRepoSelection (repo) {
  return repo.full_name || repo.text;
}

$(".zip-select2").select2({
  ajax: {
    url: "http://maxime.bercail.ovh/api/zip/",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term//, // search term
        // page: params.page
      };
    },
    processResults: function (data, params) {
    	console.log(data);
    //   // parse the results into the format expected by Select2
    //   // since we are using custom formatting functions we do not need to
    //   // alter the remote JSON data, except to indicate that infinite
    //   // scrolling can be used
    //   params.page = params.page || 1;

      return {
    //     results: data.items,
        results: data,
    //     pagination: {
    //       more: (params.page * 30) < data.total_count
    //     }
      };
    },
    cache: false
  },
  // escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 1
  // templateResult: formatRepo, // omitted for brevity, see the source of this page
  // templateSelection: formatRepoSelection  // omitted for brevity, see the source of this page
});


    
