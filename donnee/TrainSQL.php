<?php
interface TrainSQL
{
        public const SQL_LISTE_TRAINS = "SELECT * FROM trains";
		public const SQL_DETAIL_TRAINS = "SELECT * FROM trains WHERE id = :id";
}