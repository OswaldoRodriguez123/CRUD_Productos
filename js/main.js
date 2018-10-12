$(document).ready(function () {
	$("#productForm").validate({
		rules: {
			code: "required",
			name: "required",
			stock: {
				required: true,
				number: true
			},
			price: {
				required: true,
				number: true
			},
		},
		messages: {
			code: "Por favor, ingrese el codigo",
			name: "Por favor, ingrese el producto",
			category_id: "Por favor, seleccione una categoria",
			stock: {
				required: "Por favor, ingrese el stock",
				number: "Por favor, ingrese un stock valido"
			},
			price: {
				required: "Por favor, ingrese el precio",
				number: "Por favor, ingrese un precio valido"
			},
		},
		submitHandler: function (form, event) {
			event.preventDefault();
			id = $('#id').val()
			console.log(id)
			if(id == ''){
				storeProduct()
			}else{
				updateProduct();
			}
		}
	});
	getProducts();
	getCategories();
	function getProducts() {
		$.get("../CRUD_Productos/includes/products/getProducts.php", function (response){
			response = JSON.parse(response)
			ProductTable = $('#ProductTable').DataTable({
				order: [
					[0, 'asc']
				],
				data: response,
				columns: [
					{ data: 'code' },
					{ data: 'name' },
					{ data: 'category' },
					{ data: 'stock' },
					{ data: 'price' },
					{ data: 'id' }
				],
				destroy: true,
				'createdRow': function (row, data, dataIndex) {
					$(row)
						.attr('id', data.id)
						.addClass('text-center')
				},
				"columnDefs": [{
					"targets": 5,
					"render": function (data, type, row) {
						Update = '<i style="cursor: pointer; margin: 0 10px; font-size:15px;" class="glyphicon glyphicon-pencil updateProduct" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Editar" title="" data-container="body"></i>';
						Remove = ' <i style="cursor: pointer; margin: 0 10px; font-size:15px;" class="glyphicon glyphicon-remove deleteProduct" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Eliminar" title="" data-container="body"></i>'
						return "<div>" + Update + " " + Remove + "</div>";
					}
				}],
				language: {
					processing: "Procesando ...",
					search: 'Buscar',
					lengthMenu: "Mostrar _MENU_ Registros",
					info: "Mostrando _START_ a _END_ de _TOTAL_ Registros",
					infoEmpty: "Mostrando 0 a 0 de 0 Registros",
					infoFiltered: "(filtrada de _MAX_ registros en total)",
					infoPostFix: "",
					loadingRecords: "...",
					zeroRecords: "No se encontraron registros coincidentes",
					emptyTable: "No hay datos disponibles en la tabla",
					paginate: {
						first: "Primero",
						previous: "Anterior",
						next: "Siguiente",
						last: "Ultimo"
					},
					aria: {
						sortAscending: ": habilitado para ordenar la columna en orden ascendente",
						sortDescending: ": habilitado para ordenar la columna en orden descendente"
					}
				}
			});
			$('[data-toggle="popover"]').popover();
			$('table').css('width', '100%');
		});
	}

	function getCategories() {
		$.get("../CRUD_Productos/includes/products/getCategories.php", function (response) {
			response = JSON.parse(response)
			$.each(response, function (i, array) {
				$("#category_id").append("<option value="+array.id+">" + array.name + "</option>");
			});
			$('#category_id').selectpicker('refresh')
		});
	}
	$(document).on('click', '#storeModal', function () {
		$('#id').val('');
		$('#productModal').modal('show')
	});

	$("#productModal").on("hidden.bs.modal", function () {
		$('#productForm')[0].reset();
		$('#category_id').selectpicker('refresh')
	});

	function storeProduct(){
		data = $('#productForm').serialize()
		$.post('../CRUD_Productos/includes/products/storeProduct.php', { data }, function (response) {
			if (response > 0) {
				getProducts();
				$('#productModal').modal('hide');
				swal(
					'Muy bien!',
					'El producto ha sido ingresado exitosamente',
					'success'
				)
			} else {
				swal(
					'Error!',
					'Hubo un error en el proceso, intente nuevamente',
					'error'
				)
			}
		});
	}

	$(document).on('click', '.updateProduct', function () {
		var id = $(this).closest("tr").attr("id");
		$.post('../CRUD_Productos/includes/products/getProduct.php', { id }, function (data) {
			data = $.parseJSON(data);
			if(data){			
				$('#code').val(data['code']);
				$('#name').val(data['name']);
				$('#category_id').val(data['category_id']);
				$('#category_id').selectpicker('refresh');
				$('#stock').val(data['stock']);
				$('#price').val(data['price']);
				$('#id').val(id);
			}
			$('#productModal').modal('show');
		});
	});

	function updateProduct(){
		data = $('#productForm').serialize()
		$.post('../CRUD_Productos/includes/products/updateProduct.php', { data }, function (response) {
			if (response == true) {
				getProducts();
				$('#productModal').modal('hide');
				swal(
					'Muy bien!',
					'El producto ha sido actualizado exitosamente',
					'success'
				)
			}else{
				swal(
					'Error!',
					'Hubo un error en el proceso, intente nuevamente',
					'error'
				)
			}
		});
	}

	$(document).on('click', '.deleteProduct', function () {
		var id = $(this).closest("tr").attr("id");
		swal({
			title: 'Esta seguro de eliminar este producto?',
			text: "El producto no podra ser recuperado!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Eliminar!',
			cancelButtonText: 'Cancelar!'
		}).then((result) => {
			if (result.value) {
				$.post('../CRUD_Productos/includes/products/deleteProduct.php', { id }, function (response) {
					if (response == true) {
						getProducts();
						swal(
							'Muy bien!',
							'El producto ha sido eliminado exitosamente',
							'success'
						)
					} else {
						swal(
							'Error!',
							'Hubo un error en el proceso, intente nuevamente',
							'error'
						)
					}
				});
			}
		});
	});
});