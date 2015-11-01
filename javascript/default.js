// JavaScript Document

function initContent() {
	loadContent($("#sidebar .selected"));
}

function initClick() {
	$(".strip").not(".title").click(function() {
		//loadContent(this);
		selectStrip(this);
	});
}

function initDynamicContent() {
	$("#chkClass").click(function() {
		toggleCheckbox(this);
	});
}

function initDynamicClick() {
	$(".buttonPanel .button").click(function() {
		selectStrip(this);
	});
}

function loadContent(sender) {
	var clickedStripId = $(sender).attr("id");
	var documentPath = "categories/" + clickedStripId + "/index.html";
	var loadingImage = $("<img />").attr("src", "images/others/ajax-loader.gif");
	
	$("#content").append(loadingImage);
	$("#content").load(documentPath, function() {
		initDynamicContent();
		initDynamicClick();
	});

}

function selectStrip(sender) {
	if($(sender).hasClass("strip")) 
		$(".strip").not(".title").removeClass("selected");
	else
		$(sender).siblings(".button").removeClass("selected");

	$(sender).addClass("selected");
}

function toggleCheckbox(sender) {
	var isCheckAll = $(sender).prop("checked");

	$(sender).parents("tr").nextAll().each(function() {
		$(this).find("input[type='checkbox']").prop("checked", isCheckAll);
	});
}