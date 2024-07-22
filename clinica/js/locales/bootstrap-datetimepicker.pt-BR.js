/**
 * Brazilian translation for bootstrap-datetimepicker
 * Cauan Cabral <cauan@radig.com.br>
 */
;(function($){
    $.fn.datetimepicker.dates['pt-BR'] = {
        format: 'dd/mm/yyyy',
        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
        daysMin: ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa", "Do"],
        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje",
        suffix: [],
        meridiem: [],
        daysOfWeekDisabled: [0], // Desabilita domingos
        disabledTimeIntervals: [
            [moment().startOf('day'), moment().startOf('day').hour(9)], // Desabilita antes das 09:00
            [moment().startOf('day').hour(18), moment().endOf('day')] // Desabilita após as 18:00
        ],
        enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17], // Horários permitidos dentro do intervalo
        startDate: '+0d', // Impede a seleção de datas passadas
        todayHighlight: true,
		beforeShowDay: function(date){
			var time = date.getHours();
			var minutes = date.getMinutes();
			if ($.inArray(time, [9, 10, 11, 12, 13, 14, 15, 16, 17]) === -1 || minutes !== 0) {
				return {
					classes: 'disabled-time'
				};
			}
			return;
		}
		
    };
}(jQuery));
