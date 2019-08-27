$(document).ready(function () {

	const createdCell = function (cell) {

		cell.addEventListener('click', function (e) {
			var selrow = table.row($(this).parents('tr')),
				id = selrow.data().id,
				concept_id = selrow.data().concept_id;
			$.ajax({
				url: 'label.php',
				type: "POST",
				data: {
					id: id,
					concept_id: concept_id
				},
				success: function (response) {
					if (response === 'norows') {
						$('#labelbox').modal('show');
						$('#labelbox .modal-body').html('No Labels yet');
					} else {
						var res = $.parseJSON(response);

						$('#labelbox').modal('show');
						$.each(res, function (key, data) {
							console.log(key)
							$('#labelbox .modal-body').append('<span><b>' + key + '.' + '</b></span>');
							$.each(data, function (index, data) {
								// console.log('index', data)
								console.log(index + ':' + data)
								$('#labelbox .modal-body').append('<div>' + index + ':' + data + '</div>');
							})
							$('#labelbox .modal-body').append('<br>');
						})
					}
				}
			})
		})
	}

	var table = $('#example').DataTable({
		"paging": true,
		'select': true,
		"ordering": true,
		'searching': true,
		"processing": true,
		'select': true,
		'ajax': {
			url: 'serverside.php',
			dataSrc: 'data'
		},
		// 'draw' : 1,
		'length': 10,
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		],
		'columns': [{
				data: 'concept_id'
			},
			{
				data: 'concept_name'
			},
			{
				data: 'concept_type'
			},
			{
				data: 'period_type'
			},
			/* EDIT */
			{
				mRender: function (data, type, row) {
					return '<a class="table-edit" data-id="' + row.id + '">EDIT</a> | <a class="table-delete" data-id="' + row.id + '" data-toggle="modal" data-target="#confirm-delete">DELETE</a>'
				}
			}
		],
		"columnDefs": [{
				"targets": [0, 2, 3],
				"searchable": false
			},
			{
				"targets": 4,
				"orderable": false
			},
			{
				"targets": 0,
				createdCell
			},
		]
	});

	$('#example').on('click', '.table-delete', function () {
		var selrow = table.row($(this).parents('tr')),
			id = selrow.data().id,
			concept_id = selrow.data().concept_id;
		$('#yes-delete').on('click', function (e) {
			$.ajax({
				url: 'deleterow.php',
				type: "POST",
				data: {
					id: id,
					concept_id: concept_id
				},
				success: function (data) {
					console.log(data);
					$('#confirm-delete').modal('hide');
					table.ajax.reload();
				}
			})
		});
		$('#cancel-delete').on('click', function (e) {
			e.preventDefault();
			$('#confirm-delete').modal('hide');
		});

	});

	$('#example').on('click', '.table-edit', function () {
		jQuery('.error').remove();
		var selrow = table.row($(this).parents('tr'));
		id = selrow.data().id,
			concept_id = selrow.data().concept_id,
			concept_name = selrow.data().concept_name,
			concept_type = selrow.data().concept_type,
			period_type = selrow.data().period_type;

		$('#myModal').modal('show');
		$('#myModal .modal-title').html('Edit Concept');
		$('#myModal #submit-form').val('Update');
		$('#myModal #concept_id').val(concept_id);
		$('#myModal #concept_name').val(concept_name);
		$('#myModal #concept_type').val(concept_type);
		$('#myModal #period_type').val(period_type);
		$('#submit-form').on('click', function (e) {

			e.preventDefault();
			validate();
			if (valid) {
				var d = {
					concept_id,
					concept_name,
					concept_type,
					period_type
				};
				$.ajax({
					url: 'updaterow.php',
					type: "POST",
					data: {
						id: id,
						concept_id: concept_id,
						concept_name: concept_name,
						concept_type: concept_type,
						period_type: period_type
					},
					success: function (data) {
						$('#myModal').modal('hide');
						table.ajax.reload();
					}
				})
			}
		});
		$('#cancel').on('click', function (e) {
			e.preventDefault();
			$('#myModal').modal('hide');
		});
	});
	$('body').on('click', '#add-concept', function () {
		jQuery('.error').remove();
		console.log('dhdfh');
		$('#myModal .modal-title').html('Add Concept');
		$('#myModal #submit-form').val('Save');
		$('#myModal #concept_id').val('');
		$('#myModal #concept_name').val('');
		$('#myModal #concept_type').val('');
		$('#myModal #period_type').val('');
		$('#concept-form').on('submit', function (e) {
			validate();
			if (!valid) {
				e.preventDefault();
			}
		});
	});

	function validate() {
		jQuery('.error').remove();
		valid = 1;
		concept_id = $('#myModal #concept_id').val();
		concept_name = $('#myModal #concept_name').val();
		concept_type = $('#myModal #concept_type').val();
		period_type = $('#myModal #period_type').val();
		if (concept_id == '') {
			jQuery('<div class="error">Please enter the Concept ID</div>').insertAfter(jQuery("#myModal #concept_id"));
			valid = 0;
		}
		if (concept_name == '') {
			jQuery('<div class="error">Please enter the Concept Name</div>').insertAfter(jQuery("#myModal #concept_name"));
			valid = 0;
		}
		if (!concept_type) {
			jQuery('<div class="error">Please enter the Concept Type</div>').insertAfter(jQuery("#myModal #concept_type"));
			valid = 0;
		}
		if (!period_type) {
			jQuery('<div class="error">Please enter the Period Type</div>').insertAfter(jQuery("#myModal #period_type"));
			valid = 0;
		}
		if (!valid) {
			return false;
		}
	}
});