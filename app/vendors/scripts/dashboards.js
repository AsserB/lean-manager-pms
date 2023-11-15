const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Комфортная школа', 'Эффективный регион', '"Лидер бережливости"'],
            datasets: [{
                label: 'Проекты',
                backgroundColor: [
                    '#0033cc',
                    '#cc3300',
                    '#339933'
                ],
                data: [dbSchool, dbRegion, dbEvent],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
            }
        }
    });


    const orgType = document.getElementById('myChartOrgType');

    new Chart(orgType, {
        type: 'doughnut',
        data: {
            labels: ['Дошкольное образование', 'Общее образование', 'Среднее профессиональное образование', 'Высшее образование', 'Институты развития', 'Доп. проф образование'],
            datasets: [{
                label: 'Тип организации',
                backgroundColor: [
                    '#FF9900',
                    '#CC66FF',
                    '#339933',
                    '#3333FF',
                    '#66CC99',
                    '#FF0000'
                ],
                data: [dbDO, dbOO, dbSPO, dbVO, dbIR, dbDPO],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
            }
        }
    });