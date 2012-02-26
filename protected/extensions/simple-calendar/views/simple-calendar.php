<table id="calendar">
    <thead>
        <tr class="month-year-row">
            <th class="previous-month"><?php echo CHtml::link('<<', $this->previousLink); ?></th>
            <th colspan="5"><?php echo $this->monthName.', '.$this->year; ?></th>
            <th class="next-month"><?php echo CHtml::link('>>', $this->nextLink); ?></th>
        </tr>
        <tr class="weekdays-row">
            <?php
            $week_day = Yii::app()->locale->getWeekDayNames('abbreviated', true);
            $first_day = $week_day[0];
            unset($week_day[0]);
            array_push($week_day, $first_day);
            foreach($week_day as $weekDay): ?>
                <th><?php echo $weekDay; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php $daysStarted = false; $day = 1; ?>
        <?php for($i = 1; $i <= $this->daysInCurrentMonth+$this->firstDayOfTheWeek; $i++): ?>
            <?php if(!$daysStarted) $daysStarted = ($i == $this->firstDayOfTheWeek-1); ?>
            <td <?php
                $date = $this->year.".".$this->month.".".$day;
                $d = CDateTimeParser::parse($date,'yyyy.M.dd');
                $class = '';
                $class_d = '';
                $key = array_search($d, Orders::model()->dateBrony($_GET['id_item']));
                $key_succ = array_search($d, Orders::model()->dateSucc($_GET['id_item']));
                    //echo $key;
                if(empty($key)) $class = 'date_free';
                elseif(!empty($key_succ)) $class = 'date_succ';
                else $class = 'date_brony';
                if($day == $this->day) $class_d = 'calendar-selected-day';
                echo "class='".$class." ".$class_d."'";
                ?>>
                <?php if($daysStarted && $day <= $this->daysInCurrentMonth): ?>
                    <?php echo CHtml::link($day, $this->getDayLink($day)); ?>
                    <? $day++; ?>
                <?php endif; ?>
            </td>
            <?php if($i % 7 == 0): ?>
                </tr><tr>
            <?php endif; ?>
        <?php endfor; ?>
        </tr>
    </tbody>
</table>
